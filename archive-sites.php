<?php get_header(); ?>

	 	<div class="container">
			<section class="grid" <?php if ( $paged > 1 ) { ?>style="margin-top: 150px"<?php } ?>>
				<?php if ( $paged < 1 ) { ?>
					<span>
						<h2 class="section-title"><?php _e('All sites', 'wpvenue'); if ( $paged >= 2 || $page >= 2 )
		echo ' &mdash; ' . sprintf( __( 'Page %s', 'wpvenue' ), max( $paged, $page ) ); ?></h2>
					</span>
				<?php } ?>
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