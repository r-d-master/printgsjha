
<!-- begin #slider -->

<div id="slider_container">
	<div id="slider">
        	<?php
				$captions = array();
				$tmp = $wp_query;
				$wp_query = new WP_Query('post_type=featured&orderby=menu_order&order=ASC');
				if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
				$fitemlink = get_post_meta($post->ID,'snbf_fitemlink',true);
			?>

        	<?php if($fitemlink !=''){?>
			<a href="<?php echo $fitemlink;?>">
			<?php }?>

			<img class="slideimg" src="<?php echo get_post_meta($post->ID, 'snbf_slideimage_src', true); ?>" alt="<?php echo get_post_meta($post->ID, 'snbf_fitemcaption', true); ?>" title="<?php echo get_post_meta($post->ID, 'snbf_fitemcaption', true); ?>" />

			<?php if($fitemlink !=''){?>
			</a>
			<?php }?>
			<?php echo $image[0]; ?>
	    	<?php
		    endwhile; wp_reset_query();
		    endif;
		    $wp_query = $tmp;
		    ?>
	</div>
</div>
<!-- end #slider -->

<!-- nivo slider & slider settings -->
		<script type="text/javascript">
		$j = jQuery.noConflict();
			$j(window).load(function() {
				$j('#slider').nivoSlider({
					effect:'<?php if(of_get_option('snb_slidereffect')==''): echo 'random';
						  else: echo of_get_option('snb_slidereffect');
						  endif;?>',
					slices:<?php if(of_get_option('snb_showslide')==''): echo '15';
						  else: echo of_get_option('snb_showslide');
						  endif;?>,
					animSpeed:<?php if(of_get_option('snb_slideranimationspeed')==''): echo '500';
						  else: echo of_get_option('snb_slideranimationspeed');
						  endif;?>,
					pauseTime:<?php if(of_get_option('snb_sliderpausetime')==''): echo '3000';
						  else: echo of_get_option('snb_sliderpausetime');
						  endif;?>,
					startSlide:0, //Set starting Slide (0 index)
					directionNav:true, //Next &amp; Prev
					directionNavHide:false, //Only show on hover
					controlNav:true, //1,2,3...
					controlNavThumbs:false, //Use thumbnails for Control Nav
					controlNavThumbsFromRel:false, //Use image rel for thumbs
					controlNavThumbsSearch: '.jpg', //Replace this with...
					controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
					keyboardNav:true, //Use left &amp; right arrows
					pauseOnHover:true, //Stop animation while hovering
					manualAdvance:false, //Force manual transitions
					captionOpacity:<?php if(of_get_option('snb_slidercaptionopacity')==''): echo '0.8';
						  else: echo of_get_option('snb_slidercaptionopacity');
						  endif;?>, //Universal caption opacity
					beforeChange: function(){},
					afterChange: function(){},
					slideshowEnd: function(){} //Triggers after all slides have been shown

					//check for slider options at http://nivo.dev7studios.com/#usage
				});
			});
		</script>

		<link rel='stylesheet' id='nivo-slider-css' href='<?php echo get_template_directory_uri(); ?>/library/css/nivo-slider.css?ver=3.4.1' type='text/css' media='all' />
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/library/js/jquery.nivo.slider.pack.js?ver=1.0'></script>
		<!-- end nivo slider & slider settings -->