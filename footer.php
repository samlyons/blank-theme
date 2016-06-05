</div><!-- #content -->
		<div id="footer">
			<div class="wrap">

				&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>

				<?php if(have_rows('social_media_icons',4)): while(have_rows('social_media_icons',4)):the_row(); // Social Media ?>
					<div class="social">
						<?php if( get_sub_field('instagram_url') ): ?>
							<a target="_blank" href="<?php the_sub_field('instagram_url');?>"><i class="fa fa-instagram"></i></a>
						<?php endif; ?>
						<?php if( get_sub_field('facebook_url') ): ?>
							<a target="_blank" href="<?php the_sub_field('facebook_url');?>"><i class="fa fa-facebook-official"></i></a>
						<?php endif; ?>
						<?php if( get_sub_field('twitter_url') ): ?>
							<a target="_blank" href="<?php the_sub_field('twitter_url');?>"><i class="fa fa-twitter-square"></i></a>
						<?php endif; ?>
					</div>
				<?php endwhile; endif; //  social media ?>

			</div>
		</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>