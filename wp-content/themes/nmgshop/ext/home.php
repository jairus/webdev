<?php get_header(); ?>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
        <?php /*?>
          <div class="navbar">
            <ul class="navbar-inner">
            <div class="nav-collapse">
             <?php include_once (dirname(__FILE__)."/leftmenu.php") ?>
            </div>
           </ul>
          </div><!--/.navbar -->
<?php */?>
          <div class="leaderboard">
            <h1>NMG Theme</h1>
            <p>Welcome to Zurpay!</p>
            <p><a class="btn btn-success btn-large">Join Zurpay Now!</a></p>
          </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
            	<hr />
            </div>
        </div>
         <div class="row-fluid">
            <div class="span12" >
            	<h1>Featured Products</h1>
                <div class="featured-product-container">
                	<ul class="products">
                	<?php
						$args = array( 'post_type' => 'product', 'posts_per_page' => 12 );
						$loop = new WP_Query( $args );
						
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
						
                        	<li class="product">	
				
				<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
				
					<?php //woocommerce_show_product_sale_flash( $post, $_product ); //shows the "Sale!" alert on product?>
					
					<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.$woocommerce->plugin_url().'/assets/images/placeholder.png" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />'; ?>
									
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
            <div class="span12" >
            <div class="span3">
              <h4>Widget1</h4>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
             <!-- <p><a class="btn btn-success btn-large" href="#">Start Learning now</a></p>-->
            </div><!--/span-->
            <div class="span3">
              <h4>Widget2</h4>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <!--<p><a class="btn btn-success btn-large" href="#">Start practicing now</a></p>-->
            </div><!--/span-->
            <div class="span3">
              <h4>Widget3</h4>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
             <!-- <p><a class="btn btn-success btn-large" href="#">Start developing now</a></p>-->
            </div><!--/span-->
            <div class="span3">
              <h4>Widget4</h4>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
             <!-- <p><a class="btn btn-success btn-large" href="#">Start developing now</a></p>-->
            </div><!--/span-->
             </div><!--/span-->
            
          </div><!--/row-->
          <div class="span11">
  		<?php get_footer(); ?>
        </div>
    </div><!--/.fluid-container-->