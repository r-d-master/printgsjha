<?php get_header(); ?>

			<div id="content" class="clearfix">

				<!-- begin nivo slider -->
					<?php if(of_get_option('snb_displayslider') == '1') { ?>
					<?php if(of_get_option('snb_slidertype') == 'nivo') { ?>
					<?php get_template_part( 'homepage', 'slider' ); ?>
					<?php } ?>
					<?php } ?>
				<!-- end nivo slider -->

				<?php if(of_get_option('snb_blurbhome') == '1') { ?>
				<!-- begin .blurb -->
				<div class="blurb">
					<?php if(!of_get_option('snb_blurb') == '')  { ?>
					<?php echo of_get_option('snb_blurb') ?>
					<?php }?>
				</div>
				<div class="hrThickFull"></div>
				<!-- end .blurb -->
				<?php } ?>

				<?php if(of_get_option('snb_homecontent') == '1') { ?>
				<!--begin cols content -->
				<div class="oneThird homecontent">
					<h3><?php echo of_get_option('snb_homecontent1title') ?></h3>
					<p>
					<img src="<?php echo of_get_option('snb_homecontent1img') ?>" class="alignleft" alt="<?php echo of_get_option('snb_homecontent1title') ?>" />
					<?php echo of_get_option('snb_homecontent1') ?>
					</p>

					<?php if(of_get_option('snb_homecontent1url') != '') { ?>
					<p><a href="<?php echo of_get_option('snb_homecontent1url') ?>" class="more-link"><?php _e('Read more', 'site5framework'); ?></a></p>
					<?php } ?>
				</div>

				<div class="oneThird homecontent">
					<h3><?php echo of_get_option('snb_homecontent2title') ?></h3>
					<p>
					<img src="<?php echo of_get_option('snb_homecontent2img') ?>" class="alignleft" alt="<?php echo of_get_option('snb_homecontent2title') ?>" />
					<?php echo of_get_option('snb_homecontent2') ?>
					</p>

					<?php if(of_get_option('snb_homecontent2url') != '') { ?>
					<p><a href="<?php echo of_get_option('snb_homecontent2url') ?>" class="more-link"><?php _e('Read more', 'site5framework'); ?></a></p>
					<?php } ?>
				</div>

				<div class="oneThird last homecontent">
					<h3><?php echo of_get_option('snb_homecontent3title') ?></h3>
					<p>
					<img src="<?php echo of_get_option('snb_homecontent3img') ?>" class="alignleft" alt="<?php echo of_get_option('snb_homecontent3title') ?>" />
					<?php echo of_get_option('snb_homecontent3') ?>
					</p>

					<?php if(of_get_option('snb_homecontent3url') != '') { ?>
					<p><a href="<?php echo of_get_option('snb_homecontent3url') ?>" class="more-link"><?php _e('Read more', 'site5framework'); ?></a></p>
					<?php } ?>
				</div>
				<!-- end cols content -->
				<div class="hrThickFull"></div>
				<?php } ?>


				<?php if(of_get_option('snb_portfoliohome') == '1') { ?>
				<!-- begin .gallery -->
				<div class="gallery fourperrow">
				<!-- // optional "view full portfolio" button on homepage featured projects -->
				<a href="<?php echo of_get_option('snb_portfoliohomebuttonurl') ?>" class="butViewPortfolio tooltip" title="<?php echo of_get_option('snb_portfoliohomebuttontitle') ?>"><?php echo of_get_option('snb_portfoliohomebuttontitle') ?></a>
				<h2><?php echo of_get_option('snb_portfoliohometitle') ?></h2>
				<ul>

					<?php $args=array('post_type'=> 'portfolio', 'post_status'=> 'publish','orderby'=> 'menu_order','posts_per_page'=>3,'showposts'=>4,'caller_get_posts'=>1,'paged'=>$paged,); query_posts($args); while (have_posts()): the_post(); ?>

					<li>
						<div class="imgBox">

							<?php
							$thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'snbp_pitemlink', true) );
							$thumb = wp_get_attachment_image_src($thumbId, 'homepage-portfolio-thumb', false);
							$large = wp_get_attachment_image_src($thumbId, 'large', false);

							if (!$thumb == ''){ ?>

                            <img src="<?php echo $thumb[0] ?>" alt="<?php the_title(); ?>"  />

                            <?php } else { ?>

                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/sampleimages/sample-203x196.png" alt="<?php the_title(); ?>" />

                            <?php }?>

						</div>
						<div class="details">
							<?php the_title(); ?>
						</div>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="overlay tooltip"></a>
					</li>
						<?php
						endwhile; wp_reset_query(); ?>

				</ul>
				</div>
				<!-- end .gallery -->
				<?php } ?>

			</div> <!-- end #content -->
		<script type="text/javascript">
		$j = jQuery.noConflict();
		$j(document).ready(function(){
					showOverlay();
				});
		</script>
<?php get_footer(); ?>
