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

//Single Product Side Bar
$args = array();
$args['name']="Product Page Side Bar";
$args['id']="single-product-side-bar";
$args['description']="Product Page Side Bar";
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

/* enqueueing bootstrap js */
function bootstrap_scripts_method() {
wp_enqueue_script('bootstrap-transition',get_template_directory_uri().'/twitter-bootstrap-v2/docs/assets/js/bootstrap-transition.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-alert',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-alert.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-modal',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-modal.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-dropdown',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-dropdown.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-scrollspy',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-scrollspy.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-tab',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-tab.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-tooltip',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-tooltip.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-popover',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-popover.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-button',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-button.js',array('jquery'), '2.0.1', true);
wp_enqueue_script('bootstrap-collapse',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-collapse.js',array('jquery'), '2.0.1', true);
if(is_home()){
wp_enqueue_script('bootstrap-carousel',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-carousel.js',array('jquery'), '2.0.1', true);}
wp_enqueue_script('bootstrap-typeahead',get_template_directory_uri() .'/twitter-bootstrap-v2/docs/assets/js/bootstrap-typeahead.js',array('jquery'), '2.0.1', true);
}
add_action('wp_enqueue_scripts', 'bootstrap_scripts_method');

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

add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

//Add walker function for twitter bootstrap wp-menu
require_once(ABSPATH  . '/wp-content/themes/nmgshop/scripts/walker.php');

add_action('woocommerce_share','wooshare');

function wooshare(){
global $post;	
?>
    <a id="fb-share" style='text-decoration:none;' type="icon_link" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); echo " | "; bloginfo('name'); ?>&amp;p[summary]=<?php echo $post->post_content; ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php 
		
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image="http://example.com/image.jpg"; //replace this with a default image on your server or an image in your media library
		echo  $default_image;
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo  esc_attr( $thumbnail_src[0] );
	}
	
	
	 ?>','sharer','toolbar=0,status=0,width=580,height=325');" href="javascript: void(0)"> test
    </a>
    
    <script type="text/javascript">
		function shareOnTwitter(url) {
		popupWindow = window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title()."->"; ?>','popUpWindow','height=300,width=500,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes'); }
	</script>
    
    <a id="shareOnTwitter" title="Tweet" href="javascript: void(0)" onclick="shareOnTwitter(this.href);return false;"><img alt="Tweet this!" src="http://twitter-badges.s3.amazonaws.com/t_small-a.png"></a>
    
    <script>
		function setTwitterShareUrl(url) {
$('#shareOnTwitter').attr('href', $('#shareOnTwitter').attr('href').replace(/%%shareUrl%%/,url));
}
	</script>
    
    
<?php
}
?>