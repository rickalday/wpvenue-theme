<?php get_header();
	global $wp_query;
	$term = $wp_query->query_vars['term'];
?>
	 	<div class="container">
			<section class="grid" <?php if ( $paged > 1 ) { ?>style="margin-top: 150px"<?php } ?>>
					<span>
						<h2 class="section-title"><?php echo $term; ?> <?php _e('sites', 'wpvenue'); ?></h2>
					</span>
					<div class="items-gallery">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'site' ); ?>

						<?php endwhile; ?>
						<article class="grid-item placeholder"></article>
						<article class="grid-item placeholder"></article>
						<article class="grid-item placeholder"></article>
						<?php if(function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div> <!-- .items-gallery -->

			</section><!-- #fromblog -->
		</div> <!-- .container -->


<?php get_footer(); ?>