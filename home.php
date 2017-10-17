<?php get_header(); ?>

	<?php if ( $paged < 1 && is_home()) { ?>
		<section class="hero">
	 		<div class="intro-text">
		 		<h1 class="hero-title">WPVenue</h1>
		 		<h2 class="hero-tagline">A showcase of beautiful WordPress powered sites</h2>
		 	</div>

	 	</section>
	 <?php } ?>
	 	<div class="container">

			<section class="grid" <?php if ( $paged > 1 ) { ?>style="margin-top: 150px"<?php } ?>>
				<?php if ( $paged < 1 ) { ?>
					<span>
						<h2 class="section-title">Latest from the showcase</h2>
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