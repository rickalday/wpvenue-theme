<!-- Pagination -->
		<?php if ( $paged < 1 && is_home()) { ?>
		<div id="slider-wrap">
			<?php
			//	Homepage Slideshow
			//if ( '' <> $theme_options['slideshow'] && isset( $theme_options['slideshow_enable']) && is_home() || '' <> $theme_options['slideshow'] && isset( $theme_options['slideshow_enable'])  && is_front_page() ) {

				// Get Slides
				$args = array(
					'showposts'=> 5,
					'post_type' => 'sites',
					'ignore_sticky_posts'=> 1
				);
				query_posts($args);
				?>
				<div id="home-slider">
					<div class="flexslider home-slider">
				        <ul class="slides">

							<?php while ( have_posts() ) : the_post(); ?>
								<li>
									<div class="slide">
										<?php the_post_thumbnail('large'); ?>
										<div class="slide-button-wrap container">
											<?php $url = get_post_meta($post->ID, 'url', $single = true); ?>
											<!--<a class="slide-button" href="<?php echo $url; ?>">Visit site</a> -->
											<div class="flex-caption">
												<h2 class="home-slide-title">
													<?php the_title(); ?>
												</h2>
											</div>
										</div>
									</div>
								</li>
						<?php endwhile; wp_reset_query()?>
						</ul> <!-- .slides -->
					</div> <!-- .flexslider -->
				</div> <!-- #home-slider -->
		<?php //} ?>
	</div><!-- #slider-wrap -->
	<!-- End Pagination -->
	<?php } ?>