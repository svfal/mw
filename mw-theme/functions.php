<?php
// Zeug aus dem Tutorial, so l�dt man wohl Scripts und Sylesheets
function musikwerk_files(){	
	wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat');
    wp_enqueue_style('bootstrap_style', get_stylesheet_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('musikwerk_main_styles', get_stylesheet_uri());
    
  	wp_enqueue_script('bootstrap_script', get_stylesheet_directory_uri() . '/js/bootstrap.js',array('jquery'));
    wp_enqueue_style('bootstrap_style', get_stylesheet_directory_uri() . '/style.css');
    
}
add_action('wp_enqueue_scripts', 'musikwerk_files');

 
//add_action('wp_enqueue_scripts', 'force_load_foogallery');

  /**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'musikwerk-theme' ),
) );

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

/**
 * Woocommerce
 */
function mw_theme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 300,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}

/* Disable related products on product page */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'after_setup_theme', 'mw_theme_add_woocommerce_support' );

/* Disable product metas on product details page */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Loco translate
 */

load_theme_textdomain ('mw-theme', get_template_directory().'/languages');

load_plugin_textdomain('mw-theme', dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Woocommerce Menu
 */
//* Make Font Awesome available
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('Warenkorb anzeigen', 'my-theme');
		$start_shopping = __('Start shopping', 'my-theme');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'my-theme'), $cart_contents_count);
		//$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		 if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="wooshoppingcart"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="wooshoppingcart"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			//$menu_item .= $cart_contents.' - '. $cart_total;
            		//$menu_item .= $cart_contents;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		}
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>
	<a class="wcmenucart-contents nav-link" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('Warenkorb anzeigen', 'my-theme'); ?>"><i class="fa fa-shopping-cart"></i></a>
<?php
	$fragments['a.wcmenucart-contents'] = ob_get_clean();
	return $fragments;
}

/**
 * Add Bootstrap form-control class to the woocommerce quantity input field
 */
add_filter('woocommerce_quantity_input_classes', function($classes) {
	array_push($classes, 'form-control');
	return $classes;
});

/**
 * Add Bootstrap form-control class to the woocommerce variant select field
 */
add_filter('woocommerce_dropdown_variation_attribute_options_args', function($args) {
	$args += array('class' => 'form-control');
	return $args;
});

/**
 * Add Bootstrap form-control class to the woocommerce quantity input field
 */
add_filter('woocommerce_quantity_input_classes', function($classes) {
	array_push($classes, 'form-control');
	return $classes;
});

/**
 * Add Bootstrap form-control class to the woocommerce variant select field
 */
add_filter('woocommerce_dropdown_variation_attribute_options_args', function($args) {
	$args += array('class' => 'form-control');
	return $args;
});

/**
 * Redirect to checkout page after clicking "add to cart" button
 */
add_filter ('woocommerce_add_to_cart_redirect', function( $url, $adding_to_cart ) {
    return wc_get_checkout_url();
}, 10, 2 );

/**
 * Make phone number optional
 */
add_filter( 'woocommerce_billing_fields', 'kb_no_required_phone', 10, 1 );

function kb_no_required_phone( $address_fields ) {
	$address_fields['billing_phone']['required'] = false;
	return $address_fields;
}

/**
 * Overwrite WooCommerce Shop Link which is defined in WooCommerce > Settings > Products > Shop
 */
add_filter('woocommerce_get_shop_page_permalink', 'mw_shop_page_permalink');
function mw_shop_page_permalink($wooshoplink) {
    $shop = get_page_by_path('shop');
    if ($shop) {
        $permalink = get_permalink($shop->ID);
        return !$permalink ? get_home_url() : $permalink;
    } else {
        return $wooshoplink;
    }
}

/**
 * Prevent hidden shop items in WooCommerce to be shown on website
 */
add_action('pre_get_posts', 'wpse_search_query_pre');
function wpse_search_query_pre($query) {
    if ($query->is_search() && $query->is_main_query()) {
        $tax_query = $query->get('tax_query', array());
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'exclude-from-catalog',
            'operator' => 'NOT IN',
        );
        $query->set('tax_query', $tax_query);
    }
}

// Register front page announcement widget area
function musikwerk_widgets_init() {
    register_sidebar(
        array(
            'name'          => __('Startseite Ankündigung', 'musikwerk'),
            'id'            => 'front-page-announcement',
            'description'   => __('Füge besondere Ankündigungen oder Inhalte über dem Beitragsbild der Startseite hinzu.', 'musikwerk'),
            'before_widget' => '<div class="front-page-announcement mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="announcement-title">',
            'after_title'   => '</h3>',
        )
    );
    
    // Your other widget registrations may be here...
}
add_action('widgets_init', 'musikwerk_widgets_init');

// Display the front page announcement widget area
function musikwerk_display_front_announcement() {
    if (is_active_sidebar('front-page-announcement')) {
        echo '<div class="row justify-content-center mb-4 mt-4">';
        echo '<div class="col-12 col-lg-10">';
        dynamic_sidebar('front-page-announcement');
        echo '</div>';
        echo '</div>';
    }
}
add_action('musikwerk_before_featured_image', 'musikwerk_display_front_announcement');

// Registriere Menüpositionen
function musikwerk_register_nav_menus() {
    register_nav_menus(array(
        'primary'       => __('Primary Menu', 'musikwerk'),
        'footer'        => __('Footer Menü', 'musikwerk')
    ));
}
add_action('after_setup_theme', 'musikwerk_register_nav_menus');

/**
 * PDF-Anhang für bestimmtes Produkt in "Bestellung in Bearbeitung" E-Mail
 */
function mw_attach_pdf_to_order_email($attachments, $email_id, $order, $email) {
    // Bei "Bestellung in Bearbeitung" E-Mail (wird nach Zahlungsbestätigung gesendet)
    if ($email_id !== 'customer_processing_order') {
        return $attachments;
    }

    // Produkt-ID für "Gutschein MW 11"
    $target_product_id = 7948;

    // Prüfen ob das Produkt in der Bestellung ist
    if ($order) {
        foreach ($order->get_items() as $item) {
            if ($item->get_product_id() == $target_product_id) {
                // PDF-Pfad
                $pdf_path = get_template_directory() . '/assets/pdf/LeichtDrueber_Weihnachtsedition.pdf';

                if (file_exists($pdf_path)) {
                    $attachments[] = $pdf_path;
                }
                break;
            }
        }
    }

    return $attachments;
}
add_filter('woocommerce_email_attachments', 'mw_attach_pdf_to_order_email', 10, 4);

/**
 * Link-Tracking: Klicks über ?ref=X Parameter zählen
 */
add_action('template_redirect', 'mw_track_ref_click');
function mw_track_ref_click() {
    if (isset($_GET['ref'])) {
        $ref = intval($_GET['ref']);
        if ($ref > 0 && $ref <= 100) {
            $cookie_name = 'mw_tracked_ref_' . $ref;
            if (isset($_COOKIE[$cookie_name])) {
                return;
            }
            setcookie($cookie_name, '1', time() + 86400, '/'); // 24h
            $option_key = 'mw_track_clicks_' . $ref;
            $count = (int) get_option($option_key, 0);
            update_option($option_key, $count + 1, false);
        }
    }
}

/**
 * Link-Tracking: Admin-Seite unter Einstellungen → Link-Tracking
 */
add_action('admin_menu', 'mw_tracking_admin_menu');
function mw_tracking_admin_menu() {
    add_options_page(
        'Link-Tracking',
        'Link-Tracking',
        'manage_options',
        'mw-link-tracking',
        'mw_tracking_admin_page'
    );
}

function mw_tracking_admin_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Kanal-Labels speichern
    if (isset($_POST['mw_save_labels']) && check_admin_referer('mw_tracking_labels')) {
        for ($i = 1; $i <= 10; $i++) {
            $label = isset($_POST['mw_label_' . $i]) ? sanitize_text_field($_POST['mw_label_' . $i]) : '';
            update_option('mw_track_label_' . $i, $label, false);
        }
        echo '<div class="notice notice-success"><p>Kanal-Namen gespeichert.</p></div>';
    }

    // Reset-Aktion verarbeiten
    if (isset($_POST['mw_reset_ref']) && check_admin_referer('mw_tracking_reset')) {
        $reset_ref = intval($_POST['mw_reset_ref']);
        if ($reset_ref > 0) {
            delete_option('mw_track_clicks_' . $reset_ref);
            echo '<div class="notice notice-success"><p>Zähler für Link ' . esc_html($reset_ref) . ' zurückgesetzt.</p></div>';
        }
    }

    $max_links = 10;

    echo '<div class="wrap">';
    echo '<h1>Link-Tracking</h1>';
    echo '<p>Klickzahlen für trackbare Links mit <code>?ref=X</code> Parameter.</p>';

    echo '<form method="post">';
    wp_nonce_field('mw_tracking_labels');
    echo '<table class="widefat fixed striped">';
    echo '<thead><tr><th style="width:50px">Nr.</th><th style="width:150px">Kanal</th><th>URL</th><th style="width:80px">Klicks</th></tr></thead>';
    echo '<tbody>';

    for ($i = 1; $i <= $max_links; $i++) {
        $clicks = (int) get_option('mw_track_clicks_' . $i, 0);
        $label = esc_attr(get_option('mw_track_label_' . $i, ''));
        $url = home_url('/etn/leicht-drueber/?ref=' . $i);

        echo '<tr>';
        echo '<td><strong>' . $i . '</strong></td>';
        echo '<td><input type="text" name="mw_label_' . $i . '" value="' . $label . '" placeholder="Kanalname" style="width:100%"></td>';
        echo '<td><code>' . esc_html($url) . '</code></td>';
        echo '<td>' . $clicks . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '<p style="margin-top:10px"><button type="submit" name="mw_save_labels" value="1" class="button button-primary">Kanal-Namen speichern</button></p>';
    echo '</form>';

    // Reset-Buttons (separate Formulare)
    $has_clicks = false;
    for ($i = 1; $i <= $max_links; $i++) {
        if ((int) get_option('mw_track_clicks_' . $i, 0) > 0) { $has_clicks = true; break; }
    }
    if ($has_clicks) {
        echo '<h3>Zähler zurücksetzen</h3><p>';
        for ($i = 1; $i <= $max_links; $i++) {
            $clicks = (int) get_option('mw_track_clicks_' . $i, 0);
            if ($clicks > 0) {
                $label = get_option('mw_track_label_' . $i, '');
                $display = $label ? $label . ' (#' . $i . ')' : 'Link ' . $i;
                echo '<form method="post" style="display:inline; margin-right:10px">';
                wp_nonce_field('mw_tracking_reset');
                echo '<input type="hidden" name="mw_reset_ref" value="' . $i . '">';
                echo '<button type="submit" class="button button-small" onclick="return confirm(\'Zähler für ' . esc_attr($display) . ' wirklich zurücksetzen?\')">Reset ' . esc_html($display) . '</button>';
                echo '</form>';
            }
        }
        echo '</p>';
    }

    echo '</div>';
}
