<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Storyteller
 * @since storyteller 1.0
 */
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="google-site-verification" content="c6KpzBM0fHk9mRNObMrZC9Qz4nCIZzFyE5fjBPy7VZE" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );



	?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39818523-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	<header class="header">
		<div class="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/wpvenue.svg" alt="WPVenue"></a></div>

		<a class="primary-nav-trigger" href="#0">
			<span class="menu-text">Menu</span><span class="menu-icon"></span>
		</a> <!-- primary-nav-trigger -->

	</header>
	<nav>
		<ul class="primary-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'items_wrap' => '%3$s') ); ?>
			<li class="label">Follow</li>
			<li class="social facebook"><a href="https://www.facebook.com/wpvenue">Facebook</a></li>
			<li class="social twitter"><a href="https://twitter.com/wpvenue">Twitter</a></li>
			<li class="label">Site categories:</li>
			<?php
				//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
				$orderby = 'name';
				$show_count = 0; // 1 for yes, 0 for no
				$pad_counts = 0; // 1 for yes, 0 for no
				$hierarchical = 1; // 1 for yes, 0 for no
				$taxonomy = 'site_category';
				$title = '';

				$args = array(
				  'orderby' => $orderby,
				  'show_count' => $show_count,
				  'pad_counts' => $pad_counts,
				  'hierarchical' => $hierarchical,
				  'taxonomy' => $taxonomy,
				  'title_li' => $title
				);
				wp_list_categories($args);
			?>
		</ul>
	</nav>

