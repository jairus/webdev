<link href="<?php bloginfo("template_url"); ?>/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 
<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @package WooCommerce
 * @since WooCommerce 1.0
 */

get_header('shop'); ?>
	<?php 
		/** 
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */	 
		do_action('woocommerce_before_main_content');
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/** 
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */	 
		do_action('woocommerce_after_main_content'); 
	?>
	
	<?php 
		/** 
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */		
		do_action('woocommerce_sidebar'); 
	?>
	
<?php get_footer('shop'); ?>