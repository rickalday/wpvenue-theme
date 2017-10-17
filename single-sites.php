<?php
/**
 * The Template for displaying all single site posts.
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<section id="intro-preview">
		<div class="main-img-preview">
			<div class="browser-bar">
				<div class="browser-button"></div>
				<div class="browser-button"></div>
				<div class="browser-button"></div>
			</div>
			<div class="slide">

				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('large'); ?>
				<?php } ?>
					<div class="designs-template-info">
					<div class="button--centered">
						<?php $url = get_post_meta($post->ID, 'url', $single = true); ?>
						<a href="<?php echo $url; ?>" class="button designs-details-demo" data-text="Visit site">Visit site</a>
					</div>
				</div>
			</div>

		</div>
	</section>
	<main class="has-padding">
		<div class="content container">
			<div class="date"><?php $postDate = get_the_date('U'); echo timespan($postDate) ?></div>

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
			<?php
				$taxonomy = 'site_category';
				$terms = get_the_terms( $post->ID, $taxonomy );
				if (!empty( $terms )) {
					echo '<div class="sitecats">Categories: ';
					foreach($terms as $term) {
						echo '<a class="cat-filter" href="'.get_term_link($term->slug, $taxonomy).'">'.$term->name.'</a>';
					}
					echo '</div>';
				}
			?>
			<?php
				$taxonomy = 'site_tag';
				$terms = get_the_terms( $post->ID, $taxonomy );
				if (!empty( $terms )) {
					echo '<div class="sitetags">tags: ';
					foreach($terms as $term) {
						echo '<a class="cat-filter" href="'.get_term_link($term->slug, $taxonomy).'">'.$term->name.'</a>';
					}
					echo '</div>';
				}
			?>
		</div>
	</main>
	<?php wpv_content_nav('nav-below'); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>