<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	
	if(strpos($_SERVER['REQUEST_URI'],"home.php")==false){
	wp_title( '|', true, 'right' );
	}
	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	
	?></title>
    
    <!-- Le styles -->
    <link href="<?php bloginfo("template_url"); ?>/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 
	<!-- Le wp head -->    
	<?php wp_head(); ?>
  </head>

<body>
<?php
if(is_home() AND !is_search()){
	include_once(dirname(__FILE__)."/ext/home.php");
}
elseif(is_single())
{
	include_once(dirname(__FILE__)."/ext/single.php");
}
elseif(is_search())
{
	include_once(dirname(__FILE__)."/ext/searchpage.php");
}
else{
	include_once(dirname(__FILE__)."/ext/page.php");
}
?>
</body>
<?php wp_footer(); ?>
</html>