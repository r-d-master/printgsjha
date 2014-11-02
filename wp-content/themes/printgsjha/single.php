<?php get_header(); ?>

			<div id="content" class="clearfix">

				<!--<h1><?php _e("Our Blog", "site5framework"); ?>
				<?php
				$singledescpage = of_get_option('snb_singledesc');
				$singledesc = get_post_meta($singledescpage, 'snbpd_pagedesc');
				?>

				<?php if ($singledesc || is_array($singledesc)) {
				echo ' / <span>';
				echo $singledesc[0].'</span>';
				}?>
				</h1>-->

				<div class="hrThickFull"></div>

				<div id="main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


						<header>

							<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('M'); ?></span></time>

							<h2 class="single-title"  itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'site5framework' ); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

							<p class="meta"><span class="commentscount"><?php comments_popup_link(__('NO COMMENTS YET', 'site5framework'), __('1 COMMENT', 'site5framework'), __('% COMMENTS', 'site5framework')); ?></span> <?php $post_tags = wp_get_post_tags($post->ID);
							if(!empty($post_tags)) {?>
								<span class="tags">
									<?php the_tags('', ', ', ''); ?>
								</span>
						<?php }?></p>

						</header> <!-- end article header -->

						<section class="post_content">

							<?php if ( has_post_thumbnail() ) {;?>

								<div class="postthumbnail">

									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail('blog-post');?>
									</a>

								</div>

								<?php } else { ?>

							<?php }?>

							<?php the_content(); ?>

						</section> <!-- end article section -->



					</article> <!-- end article -->

					<?php comments_template(); ?>

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

				<?php get_template_part( 'blog', 'sidebar' ); ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>