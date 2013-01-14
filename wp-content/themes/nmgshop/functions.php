<?php
/*-----------------------------------------------------------------------------------*/
/* Hook in on activation */
/*-----------------------------------------------------------------------------------*/
 
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action('init', 'yourtheme_woocommerce_image_dimensions', 1);
 
/*-----------------------------------------------------------------------------------*/
/* Define image sizes / hard crop */
/*-----------------------------------------------------------------------------------*/
 
function yourtheme_woocommerce_image_dimensions() {
 
// Image sizes
update_option( 'woocommerce_thumbnail_image_width', '200' ); // Image gallery thumbs
update_option( 'woocommerce_thumbnail_image_height', '200' );
update_option( 'woocommerce_single_image_width', '888' ); // Featured product image
update_option( 'woocommerce_single_image_height', '888' ); 
update_option( 'woocommerce_catalog_image_width', '350' ); // Product category thumbs
update_option( 'woocommerce_catalog_image_height', '350' );
 
// Hard Crop [0 = false, 1 = true]
update_option( 'woocommerce_thumbnail_image_crop', 0 );
update_option( 'woocommerce_single_image_crop', 0 ); 
update_option( 'woocommerce_catalog_image_crop', 0 );
 
}

//Remove Woocommerce default css
define('WOOCOMMERCE_USE_CSS', false);

//sidebars 
$args = array();
$args['name']="Side Bar";
$args['id']="side-bar";
$args['description']="Side Bar";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

//menu
$args = array();
$args['name']="Menu Bar";
$args['id']="menu-bar";
$args['description']="Menu Bar";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

/* Footer Widgets */

$args = array();
$args['name']="Footer Widget 1";
$args['id']="footer-widget-1";
$args['description']="Footer Widget 1";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

$args = array();
$args['name']="Footer Widget 2";
$args['id']="footer-widget-2";
$args['description']="Footer Widget 2";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

$args = array();
$args['name']="Footer Widget 3";
$args['id']="footer-widget-3";
$args['description']="Footer Widget 3";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

$args = array();
$args['name']="Footer Widget 4";
$args['id']="footer-widget-4";
$args['description']="Footer Widget 4";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

/**adding featured thumbnail for the theme post and custom post typess**/
add_theme_support( 'post-thumbnails', array('post','product') ); 

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more'); 


/* Registering Theme Menu Support */
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'menu-top' => __( 'Menu Top Fixed' ),
			'menu-left' => __( 'Menu Left' )
		)
	);
}


function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/*
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);*/
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );

function frontend_scripts_include_lightbox() {
  global $woocommerce;
  
  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;
  
  if ( $lightbox_en ) {
    wp_enqueue_script( 'fancybox', $woocommerce->plugin_url() . '/assets/js/fancybox/fancybox' . $suffix . '.js', array( 'jquery' ), '1.6', true );
    wp_enqueue_style( 'woocommerce_fancybox_styles', $woocommerce->plugin_url() . '/assets/css/fancybox.css' );
  }
}
?>