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

add_action( 'after_setup_theme', 'mw_theme_add_woocommerce_support' );

/**
 * Loco translate
 */

load_theme_textdomain ('mw-theme', get_template_directory().'/languages');

load_plugin_textdomain('mw-theme', dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
