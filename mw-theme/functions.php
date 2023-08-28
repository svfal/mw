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

 
add_action('wp_enqueue_scripts', 'force_load_foogallery');

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
            $menu_item .= $cart_contents;
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


