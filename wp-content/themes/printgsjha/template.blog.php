<?php
/*
 * Template Name: Blog
*/
get_header(); ?>

			<div id="content" class="clearfix">

				<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?>/<?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h1>

				<div class="hrThickFull"></div>

				<div id="main" role="main">

						<?php
							// WP 3.0 PAGED BUG FIX
							if ( get_query_var('paged') )
							$paged = get_query_var('paged');
							elseif ( get_query_var('page') )
							$paged = get_query_var('page');
							else
							$paged = 1;

							$args = array(
							'post_type' => 'post',
							'paged' => $paged );
							query_posts($args);
						?>

						<?php if (have_posts()) : $count = 0; ?>
						<?php while (have_posts()) : the_post(); $count++; global $post; ?>

						<article id="post-<?php the_ID(); ?> blogtemplate" <?php post_class('clearfix'); ?> role="article" >

							<header>

							<time datetime="<?php echo the_time('Y-m-j'); ?>"><span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('M'); ?></span></time>

							<h2 class="blogpost-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'site5framework' ); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

							<p class="meta"><?php _e("BY", "site5framework"); ?> <?php the_author_posts_link(); ?> <span class="amp"> </span>
							<?php _e("IN", "site5framework"); ?> <?php the_category(', '); ?> <span class="commentscount"><?php comments_popup_link(__('NO COMMENTS YET', 'site5framework'), __('1 COMMENT', 'site5framework'), __('% COMMENTS', 'site5framework')); ?></span><?php $post_tags = wp_get_post_tags($post->ID);
							if(!empty($post_tags)) {?>
								<span class="tags">
									<?php the_tags('', ', ', ''); ?>
								</span>
						<?php }?></p>
							</header><!-- end article header -->

							<section class="post_content">

								<?php if ( has_post_thumbnail() ) {;?>

								<div class="postthumbnail">

									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail('blog-post');?>
									</a>

								</div>

									<?php } else { ?>

								<?php }?>

							<?php the_excerpt(); ?>

							</section> <!-- end article section -->

						</article> <!-- end article -->

					<?php endwhile; ?>

					<!-- begin #pagination -->
							<?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>
					<!-- end #pagination -->

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

				<?php get_template_part( 'blog', 'sidebar' ); ?>

			</div> <!-- end #content -->
<?php get_footer(); ?>