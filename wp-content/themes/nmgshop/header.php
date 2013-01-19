<!DOCTYPE HTML>
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
    <link href="<?php bloginfo("template_url"); ?>/twitter-bootstrap-v2/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 
   <!-- Le wp head -->    
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
<div class="navbar"> <!--navbar-fixed-top-->
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php bloginfo("url") ?>"><img src="<?php bloginfo("template_url"); ?>/images/zurpay.png" width="111" height="30" alt="zurpay logo" /></a>
          <div class="nav-collapse">
             <?php include_once (dirname(__FILE__)."/ext/mainmenus.php") ?>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>