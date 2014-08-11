<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h1>
				
				<div class="hrThickFull"></div>
			
				<div id="main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<section class="post_content">
							<?php the_content(); ?>
						</section> <!-- end article section -->
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "site5framework"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "site5framework"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_template_part( 'page', 'sidebar' ); ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>