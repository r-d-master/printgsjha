<aside>	
		<?php if ( is_active_sidebar( 'Blog' ) ) : ?>

			<?php dynamic_sidebar( 'Blog' ); ?>

		<?php else : ?>

			<!-- This content shows up if there are no widgets defined in the backend. -->
			
			<div class="help">
			
				<p><?php _e("Please activate some Widgets.", "site5framework"); ?></p>
			
			</div>
		<?php endif; ?>
</aside>