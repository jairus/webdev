<?php get_header(); ?>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
       
         <?php /*?> <div class="navbar">
            <ul class="navbar-inner">
            <div class="nav-collapse">
             <?php include_once (dirname(__FILE__)."/leftmenu.php") ?>
             
              <form>
                <input type="text" name="username" onblur="if (this.value == '') {this.value = 'username';}" onfocus="if (this.value == 'username') {this.value = '';}" value="username" onClick="" style="margin:10px 0 0 0;"/>
                <input type="password" name="password" style="margin:10px 0 0 0;"/>
            </form>
            </div>
           </ul>
          </div><!--/.navbar --><?php */?>

          <div class="leaderboard">
            <h1>NMG Theme</h1>
            <p>Welcome to Zurpay!</p>
            <p><a class="btn btn-success btn-large">Start Shopping!</a></p>
          </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
            	<hr />
            </div>
        </div>
         <div class="row-fluid">
            <div class="span12">
            	<h1>Featured Products</h1>
                <div class="featured-product-container">
                	<ul class="products">
                	<?php
						$args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'meta_key' => '_featured', 'meta_value' => 'yes' );
						$loop = new WP_Query( $args );
						
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
						
                        <li class="product span3">	
				
                        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        
                            <?php woocommerce_show_product_sale_flash( $post, $_product ); //shows the "Sale!" alert on product?>
                            
                            <?php if (has_post_thumbnail( $loop->post->ID )) {
                            
                         $image_id = get_post_thumbnail_id(); 
                         $image_url = wp_get_attachment_image_src($image_id,$size); ?>
                         <img src="<?php echo $image_url[0]; ?>" height="300" width="300" alt="<?php the_title(); ?>" />
                            
                        <?php } else echo '<img src="'.$woocommerce->plugin_url().'/assets/images/placeholder.png" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />'; ?>
                                            
                            <h3><?php the_title(); ?></h3>
                            
                            <span class="price"><?php echo $product->get_price_html(); ?></span>				
                        
                        </a>
				
				<?php //woocommerce_template_loop_add_to_cart( $loop->post, $_product ); //add to cart button?>
				
					   </li>
					<?php endwhile; ?>
                    </ul>
                </div>
            </div>
         </div>
         <hr />
         <div class="row-fluid">
            <div class="span12">
            	<h1>Recently Added Products</h1>
                <div class="featured-product-container">
                	<ul class="products">
                	<?php
						$args = array( 'post_type' => 'product', 'posts_per_page' => 8);
						$loop = new WP_Query( $args );
						
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
						
                        <li class="product span3">	
				
                        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        
                            <?php woocommerce_show_product_sale_flash( $post, $_product ); //shows the "Sale!" alert on product?>
                            
                            <?php if (has_post_thumbnail( $loop->post->ID )) {
                            
                         $image_id = get_post_thumbnail_id(); 
                         $image_url = wp_get_attachment_image_src($image_id,$size); ?>
                         <img src="<?php echo $image_url[0]; ?>" height="300" width="300" alt="<?php the_title(); ?>" />
                            
                        <?php } else echo '<img src="'.$woocommerce->plugin_url().'/assets/images/placeholder.png" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />'; ?>
                                            
                            <h3><?php the_title(); ?></h3>
                            
                            <span class="price"><?php echo $product->get_price_html(); ?></span>				
                        
                        </a>
				
				<?php //woocommerce_template_loop_add_to_cart( $loop->post, $_product ); //add to cart button?>
				
					   </li>
					<?php endwhile; ?>
                    </ul>
                </div>
            </div>
         </div>
         <hr />
         <?php get_footer(); ?>