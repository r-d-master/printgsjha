			<!-- begin #footer -->
			<footer>
			
				<div class="footerWidgets">
					
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

						<?php dynamic_sidebar( 'footer-1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="boxFooter">
						
							<p><?php _e("Please activate some Widgets.", "site5framework"); ?></p>
						
						</div>

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

						<?php dynamic_sidebar( 'footer-2' ); ?>
						<div id="quote" style="display:none;width:600px;"><?php echo do_shortcode( '[contact-form-7 id="97" title="Contact form 1"]' ); ?></div>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="boxFooter">
						
							<p><?php _e("Please activate some Widgets.", "site5framework"); ?></p>
						
						</div>

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>

						<?php dynamic_sidebar( 'footer-3' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="boxFooter">
						
							<p><?php _e("Please activate some Widgets.", "site5framework"); ?></p>
						
						</div>

					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>

						<?php dynamic_sidebar( 'footer-4' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="boxFooter">
						
							<p><?php _e("Please activate some Widgets.", "site5framework"); ?></p>
						
						</div>

					<?php endif; ?>
					
				</div> <!-- end #footerWidgets -->
				
				<!-- begin #copyright -->
				<div class="copyright">
					<?php if(of_get_option('snb_footer_copyright') == '') { ?>
					&copy; <?php bloginfo('name'); ?> is powered by <a href="http://wordpress.org/" title="WordPress">WordPress</a> <span class="amp">&amp;</span> <a href="http://www.site5.com" title="Simple'nBright">Simple'nBright</a>.
					<?php } else { ?>
					<?php echo of_get_option('snb_footer_copyright')  ?>
					<?php } ?>
					<!-- Site5 Credits
					<br>Created by <a href="http://www.s5themes.com/">Site5 WordPress Themes</a>. Experts in <a href="http://gk.site5.com/t/549">WordPress Hosting</a>. -->

				</div>
				<!-- end #copyright -->
				<div class="fb-like-box" id="facebookprint" style="display:none;" data-href="https://www.facebook.com/printpediauk" data-width="220" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!-- scripts are now optimized via Modernizr.load -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
		
	</body>

</html>