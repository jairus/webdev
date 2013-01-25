<?php get_header(); ?>
<div class="container-fluid">
    <div class="row-fluid">
		<div class="span9">

			<?php if (have_posts()) : ?>
				<h1 class="pagetitle">Search Results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>');_e(' '); _e('('); echo $count . ' '; _e('articles');  echo _e(')'); wp_reset_query(); ?></h1>
           			 <?php
					
				 query_posts($query_string . '&showposts=10');
				 
						 while (have_posts()) : the_post();
					?>
                   <a href="<?php the_permalink();?>">
                    <div class="search-container">
                        <div class="search-image">	<?php the_post_thumbnail('thumbnail'); ?>	</div>
                        <div class="search-title">	<?php the_title(); ?>	</div>
                        <div class="search-excerpt">
							<?php $ts = strtotime($post->post_date); echo date("M d Y",$ts); 
                                  the_excerpt();
                                    ?>
                         </div>
                   </div></a>
                    <?php endwhile; get_template_part( 'loop', 'search' ); ?> <?
				 else : ?>
					 <div class="search-title"><h2 class="pagetitle"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'nmgshop' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
                    
                    
					<? endif;   ?>
				</div>
              
                
<?php get_footer(); ?>
</div>