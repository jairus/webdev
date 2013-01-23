<?php get_header(); 

global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
?>
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
            <p><a class="btn btn-success btn-large" href="<?php bloginfo('url') ?>/shop">Start Shopping!</a></p>
          </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
            	<hr />
            </div>
        </div>
         <div class="row-fluid">
            <div class="span12">
            	<h2>Featured Products</h1>
                <div class="featured-product-container">
                	<ul class="products">
                	<?php
						$args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'meta_key' => '_featured', 'meta_value' => 'yes' );
						$loop = new WP_Query( $args );
						
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						
                     <?php   // Increase loop count
						$woocommerce_loop['loop']++;
						?>
						<li class="product <?php
							if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
								echo 'last';
							elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
								echo 'first';
							?>">
						
							<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
				
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
            	<h2>Recently Added Products</h1>
                <div class="featured-product-container">
                	<ul class="products">
                	<?php
						$args = array( 'post_type' => 'product', 'posts_per_page' => 8);
						$loop = new WP_Query( $args );
						
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						
                        	<?php   // Increase loop count
						$woocommerce_loop['loop']++;
						?>
						<li class="product <?php
							if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
								echo 'last';
							elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
								echo 'first';
							?>">
						
							<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
				
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
         <?php get_footer(); ?>