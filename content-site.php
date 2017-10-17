<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="browser-bar">
		<div class="browser-button"></div>
		<div class="browser-button"></div>
		<div class="browser-button"></div>
	</div><!-- !browser-bar -->
	<div class="item-img">
		<div class="designs-template-info">
			<div class="button-centered">
				<?php $url = get_post_meta($post->ID, 'url', $single = true); ?>
				<a href="<?php echo $url; ?>"class="button designs-details-demo" data-text="Visit site">Visit site</a>
			 	</div>
			</div>

			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php echo $url; ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
				</a>
			<?php } ?>
		</div>
	<div class="item-info">
		<a href="<?php the_permalink(); ?>"><em><?php the_title(); ?></em></a>
		<?php $postDate = get_the_date('U'); ?>
		<i class="date"><?php echo timespan($postDate) ?></i>
	</div>
</article>