<?php

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
add_theme_support( 'post-thumbnails', array( 'post') ); 

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
?>