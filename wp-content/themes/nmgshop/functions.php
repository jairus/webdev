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


define('WOOCOMMERCE_USE_CSS', false);
//sidebars 
$args = array();
$args['name']="Side Bar";
$args['id']="side-bar";
$args['description']="Side Bar";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);

/*menu*/
$args = array();
$args['name']="Menu Bar";
$args['id']="menu-bar";
$args['description']="Menu Bar";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);


/**adding featured thumbnail for the theme post and custom post typess**/
add_theme_support( 'post-thumbnails', array('post','product') ); 

/**
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
**/

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more'); 

//wp_enqueue_script( 'cufon', get_bloginfo('template_directory').'/assets/cufonjs/cufon-yui.js', array( 'jquery' ) );

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
?>