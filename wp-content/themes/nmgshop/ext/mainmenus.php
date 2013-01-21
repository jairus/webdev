<?php
				
				$args = array(
					'theme_location' => 'menu-top',
					'depth'		 => 2,
					'container'	 => false,
					'menu_class'	 => 'nav',
					'walker'	 => new Bootstrap_Walker_Nav_Menu()
				);
 
				wp_nav_menu($args);
?>