<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">
			<?php if( have_rows('flexible_layout') ): // Flexible Content ?>
				<?php while( have_rows('flexible_layout') ): the_row(); // Flexible Content ?>

					<?php if( get_row_layout() == 'columns_three_layout' ): // Layout: Columns x3 ?>
						<?php $i = 1; if(have_rows('columns_three')): while(have_rows('columns_three')):the_row(); // Repeater ?>
							<div class="wrap">
								<div class="columns-three <?php if($i == 2) { echo 'every-second';} ?>">
									<div class="one-third column-one">
										<?php the_sub_field('column_one');?>
									</div>
									<div class="one-third column-two">
										<?php the_sub_field('column_two');?>
									</div>
									<div class="one-third column-three">
										<?php the_sub_field('column_three');?>
									</div>
								</div>
							</div>
						<?php $i++; endwhile; endif; ?>

					<?php elseif(get_row_layout() == 'pods' ): // Layout: Pods x3 ?>
						<div class="wrap">
							<div class="pods">
								<?php $i = 0; if(have_rows('pod')): while(have_rows('pod')):the_row(); // Repeater ?>
									<?php $bg_image = get_sub_field('background_image'); ?>
									<a class="pod pod-position-<?php echo $i //Counter ?>" style="background: url(<?php echo $bg_image['url']; ?>) 0 0 no-repeat;" href="<?php the_sub_field('link');?>">
										<span class="vcenter">
											<span class="title"><?php the_sub_field('title');?></span>
											<span class="text knockout"><?php the_sub_field('text');?></span>
										</span>
									</a>
								<?php $i++; endwhile; endif; ?>
							</div>
						</div>

					<?php elseif(get_row_layout() == 'slideshow' ): // Layout: Slideshow (slick) ?>
			        	<div class="header-slider">
				            <div class="slider-background">
				                <ul class="slides">
				                	<?php if(have_rows('slide')): while(have_rows('slide')):the_row(); ?>
										<li class="slide">
											<img src="<?php the_sub_field('background_image');?>" alt="Slide">
											<div class="slide-content">
												<p class="slide-text knockout"><?php the_sub_field('slide_text');?></p>
												<?php if( get_sub_field('link_text') ): ?>
													<a class="button" href="<?php the_sub_field('link');?>"><?php the_sub_field('link_text');?></a>
												<?php endif; ?>
											</div>
										</li>
									<?php endwhile; endif; ?>
				                </ul>
				            </div>
				        </div>

					<?php elseif(get_row_layout() == 'instagram' ): // Layout: Instagram ?>
						<div class="wrap" id="<?php the_sub_field('power');?>">
						</div>

					<?php elseif(get_row_layout() == 'newsletter_modal' ): // Layout: Newsletter Modal?>
						<?php if( get_sub_field('power') == "on") { // if Select Logo Type choice = Text ?>
							<div class="wrap">
							    <div class="subs-popup">
							        <div class="pop-container"></div>
							    </div>
							    <div class="content">
							        <div class="cookie"></div>
							    </div>
							</div>
						<?php } // End IF select ?>

					<?php elseif(get_row_layout() == 'full_width' ): // Layout: Full Width ?>
						<?php $i = 1; if(have_rows('full_width')): while(have_rows('full_width')):the_row(); // Repeater ?>
							<div class="wrap">
								<div class="full-width">
									<?php the_sub_field('fullwidth_text');?>
								</div>
							</div>
						<?php $i++; endwhile; endif; ?>

					<?php elseif(get_row_layout() == 'onethird_twothird' ): // Layout: One Third/Two Third?>
							<?php $i = 1; if(have_rows('onethird_twothird')): while(have_rows('onethird_twothird')):the_row(); // Repeater ?>
								<div class="wrap">
									<div class="one-third">
										<?php the_sub_field('onethird_text');?>
									</div>
									<div class="two-thirds border-wrap text">
										<?php the_sub_field('twothird_text');?>
									</div>
								</div>
							<?php $i++; endwhile; endif; ?>

					<?php elseif(get_row_layout() == 'blog_posts' ): // Layout: blog posts?>
						<div class="wrap" id="blog-posts">
							<?php // WP_Query using the loop for output custom post type list anywhere
							$numposts = get_sub_field('number_of_posts');
							$mynewloop = new WP_Query(
							  array(
							    'post_type' => 'post',
							    'order' => 'DESC',
							    'posts_per_page' => $numposts,
							    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 )
							  );
							if ($mynewloop->have_posts()) : while ($mynewloop->have_posts()) : $mynewloop->the_post();
							?>
							<?php the_post_thumbnail( 'large' ); ?>
							<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
						<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>

					<?php endif; // End Ifs ?>

				<?php endwhile; // End Flexible Content ?>
			<?php endif; // End Flexible Content ?>
		</div><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>