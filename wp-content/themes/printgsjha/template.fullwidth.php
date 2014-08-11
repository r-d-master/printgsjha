<?php
/*
 * Template Name: Fullwidth Page
 */
get_header(); ?>
			<div id="content" class="clearfix">

				<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h1>

				<div class="hrThickFull"></div>

				<div id="main" class="fullwidth" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                           	<section class="post_content">
								<?php the_content(); ?>
							</section> <!-- end article section -->

							<!-- begin #pagination -->
							<?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>
							<!-- end #pagination -->

							<?php wp_reset_query(); ?>


					<?php endwhile; ?>

					<?php else : ?>

					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "site5framework"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "site5framework"); ?></p>
					    </section>
					</article>

					<?php endif; ?>

				</div> <!-- end #main -->

			</div> <!-- end #content -->
<?php get_footer(); ?>