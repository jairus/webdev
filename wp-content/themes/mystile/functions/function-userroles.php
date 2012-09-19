<?php 

if (current_user_can('shop_manager')) {
	
	//include_once ( get_template_directory() . '/functions/css/admin.css' );
	
	function my_admin_head() {
	$url = get_option('siteurl');
    $dir = $url . '/wp-content/themes/mystile/';
    echo '<link rel="stylesheet" type="text/css" href="' .$dir. '/functions/css/adminstyle.css'. '">';
		
		/*echo '<style type="text/css">
           #wphead{background:#592222}
           #footer{background:#592222}
           #footer-upgrade{background:#592222}
         </style>'; */
	}

	add_action('admin_head', 'my_admin_head');
	
	//Remove unecessary user roles
	$role = get_role('shop_manager');	
	$role->remove_cap('edit_others_pages');
	$role->remove_cap('edit_others_posts');
	$role->remove_cap('delete_others_pages');
	$role->remove_cap('delete_others_posts');
	$role->remove_cap('publish_posts');
	$role->remove_cap('publish_pages');
	$role->remove_cap('delete_posts');
	$role->remove_cap('delete_pages');
	
	
	//Remove Main Menu Items
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
	  
	//Hook into admin menu
	add_action('admin_menu', 'remove_menu_items');
	
	
	//Remove Sub-Menu items
	function remove_submenus() {
	  global $submenu;
	  unset($submenu['users.php'][5]); //All Users
	  unset($submenu['users.php'][10]); //Add Users
	  unset($submenu['index.php'][10]); // Updates'.
	}
	//Hook into admin menu
	add_action('admin_menu', 'remove_submenus');
	
	
	
	//Remove unecessary Dashboard Widgets
	function example_remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal');
	} 

	// Hook into the 'wp_dashboard_setup' action to register our function
	add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );
	
}
 ?>