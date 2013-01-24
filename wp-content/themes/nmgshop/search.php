<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if (have_posts()) : ?>
				<h1 class="pagetitle">Search Results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>');_e(' '); _e('('); echo $count . ' '; _e('articles');  echo _e(')'); wp_reset_query(); ?></div>
           			 <?php
					
				 query_posts($query_string . '&showposts=10');
				 
						 while (have_posts()) : the_post();
					?>
                   
                    <div class="podcast-container">
                    <div class="podcast-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
                    <div class="podcast-excerpt">
                    <?php //remove_filter('the_excerpt', 'wpautop'); ?>
					<?php $ts = strtotime($post->post_date); echo date("M d Y",$ts); 
					       //echo "&nbsp;|&nbsp;"; echo get_post_meta($post->ID, "podcaster", true)."&nbsp;|&nbsp;"; 
						   the_excerpt();
						    ?>
                     </div>
                    
					<?php //echo do_shortcode('[powerpress]');?>
                   </div>
                    <?php endwhile; get_template_part( 'loop', 'search' ); ?> <?
				 else : ?>
					 <div class="podcast-title"><h2 class="pagetitle"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
                    
                    
					<? endif;   ?>

			</div><!-- #content -->
		</section><!-- #primary -->
<?php get_footer(); ?>