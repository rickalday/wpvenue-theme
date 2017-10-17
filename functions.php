<?php

add_action( 'after_setup_theme', 'wpvenue_formats', 11 );
function wpvenue_formats(){
     add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );
     add_theme_support( 'post-thumbnails' );
     register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wpvenue' )
    ) );
}


function load_wpvenue_scripts(){

    // Load Styles
    if(!is_admin()) { wp_enqueue_style( 'wpv-style', get_stylesheet_uri() ); }
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css' );

    //Load Scripts
    wp_enqueue_script( 'jquery' );
    wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array('jquery'), false, false);
    wp_enqueue_script('modernizr');
    wp_register_script( 'hideshare', get_stylesheet_directory_uri() . '/js/hideshare.min.js', array('jquery'), '1.0', false );
    wp_enqueue_script('hideshare');
    wp_register_script( 'wpvenuescripts', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0', false );
	wp_enqueue_script('wpvenuescripts');

}
add_action('init', 'load_wpvenue_scripts');


require_once('sites-custom-post-type.php');

function timespan($ts)
{
    if(!ctype_digit($ts))
        $ts = strtotime($ts);

    $diff = time() - $ts;
    if($diff == 0)
        return 'now';
    elseif($diff > 0)
    {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 60) return 'just now';
            if($diff < 120) return '1 minute ago';
            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
            if($diff < 7200) return '1 hour ago';
            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
        }
        if($day_diff == 1) return 'Yesterday';
        if($day_diff < 31) return $day_diff . ' days ago';
        //if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
        //if($day_diff < 60) return 'last month';
        return date('d F Y', $ts);
    }
    else
    {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 120) return 'in a minute';
            if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
            if($diff < 7200) return 'in an hour';
            if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
        }
        if($day_diff == 1) return 'Tomorrow';
        if($day_diff < 4) return date('l', $ts);
        if($day_diff < 7 + (7 - date('w'))) return 'next week';
        if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
        if(date('n', $ts) == date('n') + 1) return 'next month';
        return date('d F Y', $ts);
    }
}

function wpv_content_nav( $nav_id ) {
    global $wp_query, $post;

    // Don't print empty markup on single pages if there's nowhere to navigate.
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous )
            return;
    }

    // Don't print empty markup in archives if there's only one page.
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;


    ?>
    <section role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="pagination">
        <div class="container">

    <?php if ( is_single() ) : // navigation links for single posts ?>

        <?php previous_post_link( '<div class="nav prev">%link</div>', '<span class="arrow left-arrow">&larr;</span>  %title' ); ?>
        <?php next_post_link( '<div class="nav next">%link</div>', ' %title <span class="arrow right-arrow">&rarr;</span>' ); ?>

    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav prev"><?php next_posts_link( __( '<span class="arrow left-arrow"></span> Older posts', 'hyperplane' ) ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav next"><?php previous_posts_link( __( 'Newer posts <span class="arrow right-arrow"></span>', 'hyperplane' ) ); ?></div>
        <?php endif; ?>

    <?php endif; ?>
        </div>
    </section><!-- #<?php echo esc_html( $nav_id ); ?> -->
    <?php
}

function custom_queries( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display 12 items on the homepage
        $query->set( 'posts_per_page', 12 );
		$query->set( 'post_type', 'sites' );
        return;
    }


}
add_action( 'pre_get_posts', 'custom_queries', 1 );
