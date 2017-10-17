<?php get_header(); ?>

<div id="primary" class="site-content">
<div style="display:none"><h1>WPVenue is a showcase of beautiful WordPress powered sites</h1>Your number one source for WordPress inspiration.</div>
	<div id="content" role="main">

		<?php if ( is_active_sidebar( 'homepage' ) ) : ?>
			<section id="homewidgets" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'homepage' ); ?>
			</section><!-- #homewidgets .widget-area -->
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<section id="fromblog" <?php if ( $paged > 1 ) { ?>style="margin-top: 150px"<?php } ?>>
				<div class="fromblog-items-wrap blog-grid">
					<?php if ( $paged < 1 ) { ?>
					<span class="underline">
						<h2 class="section-title"><?php _e('Latest from the showcase', 'storyteller'); ?></h2>
					</span>
					<?php } ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'site' ); ?>

						<?php endwhile; ?>
						<article class="hentry placeholder"></article><article class="hentry placeholder"></article>
					<?php wp_pagenavi(); ?>
				</div> <!-- .fromblog-items-wrap -->
			</section><!-- #fromblog -->
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div><!-- #content -->
</div><!-- #primary .site-content -->

<?php get_footer(); ?>