<?php get_header(); ?>
			<div id="content" class="clearfix">

				<h1><?php _e("Portfolio", "site5framework"); ?>
				<?php
				$portfoliodescpage = of_get_option('snb_portfoliodesc');
				$portfoliodesc = get_post_meta($portfoliodescpage, 'snbpd_pagedesc');
				if ($portfoliodesc || is_array($portfoliodesc)) {				echo ' / <span>';
				echo $portfoliodesc[0].'</span>';
				}?>
				</h1>

				<div class="hrThickFull"></div>

				<div id="main" class="fullwidth" role="main">

							<ul class="filters">
								<li class="segment-1"><a href="#" data-value="all" class="selected"><?php _e('all', 'site5framework'); ?></a></li>
								<?php
								$categories=  get_categories('taxonomy=types&title_li='); foreach ($categories as $category){ ?>

								<li class="segment-<?php echo $category->term_id;?>"><a href="#" data-value="<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a></li>
								<?php }?>

							</ul>

							<!-- begin .gallery -->

							<div class="gallery threeperrow">
								<ul id="itemList">
										<?php
										global $post, $paged, $wp_query;
										$args=array('post_type'=> 'portfolio','post_status'=> 'publish','orderby'=> 'menu_order','posts_per_page'=>6,'caller_get_posts'=>1,'paged'=>$paged,); query_posts($args); while (have_posts()): the_post();
										$taxo = wp_get_object_terms( get_the_ID(), 'types');
										?>
										<li class="<?php foreach ($taxo as $taxx) { echo strtolower(preg_replace('/\s+/', '-', $taxx->slug)). ' '; } ?>" data-id="id-<?php the_ID(); ?>">
										<div class="imgBox">

										<?php
										$thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'snbp_pitemlink', true) );
										$thumb = wp_get_attachment_image_src($thumbId, 'portfolio-thumb', false);

										if (!$thumb == ''){ ?>

										<img src="<?php echo $thumb[0] ?>" alt="<?php the_title(); ?>"  />

										<?php } else { ?>

										<img src="<?php echo get_template_directory_uri(); ?>/library/images/sampleimages/sample-285x196.png" alt="<?php the_title(); ?>" />

										<?php }?>

										</div>
										<div class="details">
											<?php the_title(); ?>
										</div>
										<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="overlay"></a>
									</li>
									<?php endwhile;?>
								</ul>
							</div>

							<!-- end .gallery -->

							<!-- begin #pagination -->
							<?php if (function_exists("wpthemess_paginate")) { wpthemess_paginate(); } ?>


							<!-- end #pagination -->

							<?php wp_reset_query(); ?>

				</div> <!-- end #main -->

			</div> <!-- end #content -->
		<script type="text/javascript">
	        $j = jQuery.noConflict();
	        $j(document).ready(function(){
	        showOverlay();
	        animatedSorting(); // Init animated sorting
	        });
		</script>
<?php get_footer(); ?>