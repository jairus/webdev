<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );	

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme installation
				'includes/theme-woocommerce.php'		// WooCommerce options
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

function testing() {
  echo 'Hello World!';
}

add_action( 'admin_head', 'testing' ); 



function remove_menu_items() {
  global $menu;
  $restricted = array(__('Links'), __('Comments'), __('Media'),
  __('Plugins'), __('Tools'), __('Settings'), __('Pages'), __('Appearance'), __('Posts'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);}
    }
  }

add_action('admin_menu', 'remove_menu_items');


function remove_submenus() {
  global $submenu;
  unset($submenu['users.php'][5]); //All Users
  unset($submenu['users.php'][10]); //Add Users
  unset($submenu['index.php'][10]); // Updates'.
}

add_action('admin_menu', 'remove_submenus');

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>