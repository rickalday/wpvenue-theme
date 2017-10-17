<?php
/**
 * The Template for displaying page content.
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<main class="has-padding is-page">
		<div class="content container">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

		</div>
	</main>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>