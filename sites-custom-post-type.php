<?php


/*-----------------------------------------------------------------------------------*/
/* Register new post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'sites_create_type' );

function sites_create_type() {

    register_post_type('sites',
        array(
            'labels' => array(
                'name'                      => __('Sites','wpvenue'),
                'singular_name'             => __('Site','wpvenue'),
                'add_new'                   => __('Add New', 'wpvenue'),
                'add_new_item'              => __('Add Site', 'wpvenue'),
                'new_item'                  => __('Add Site', 'wpvenue'),
                'view_item'                 => __('View Site', 'wpvenue'),
                'search_items'              => __('Search Site', 'wpvenue'),
                'edit_item'                 => __('Edit Site', 'wpvenue'),
                'all_items'                 => __('All Sites', 'wpvenue'),
                'not_found'                 => __('No Sites found', 'wpvenue'),
                'not_found_in_trash'        => __('No Sites found in Trash', 'wpvenue')
            ),
            'taxonomies'    => array('site_category', 'site_tag'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array( 'slug' => 'sites', 'with_front' => false ),
            'query_var' => true,
            'supports' => array('title','revisions','thumbnail','author','editor','post-formats', 'custom-fields','publicize'),
            'menu_position' => 5,
            'menu_icon' => get_stylesheet_directory_uri() .'/images/sites.png',
            'has_archive' => true
        )
    );
}

/*-----------------------------------------------------------------------------------*/
/* Register taxonomy for new post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'site_taxonomy', 0 );

function site_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name', 'wpvenue' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name', 'wpvenue' ),
    'search_items' =>  __( 'Search Categories', 'wpvenue' ),
    'all_items' => __( 'All Categories', 'wpvenue' ),
    'parent_item' => __( 'Parent Category', 'wpvenue' ),
    'parent_item_colon' => __( 'Parent Category:', 'wpvenue' ),
    'edit_item' => __( 'Edit Category', 'wpvenue' ),
    'update_item' => __( 'Update Category', 'wpvenue' ),
    'add_new_item' => __( 'Add New Category', 'wpvenue' ),
    'new_item_name' => __( 'New Category Name', 'wpvenue' ),
    'menu_name' => __( 'Categories', 'wpvenue' )
  );
    register_taxonomy('site_category','sites',array(
                'hierarchical' => true,
                'labels' => $labels,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'site_category' )
    ));
}

add_action( 'init', 'site_tags', 1 );

function site_tags() {
    register_taxonomy( 'site_tag', 'sites', array(
                'hierarchical' => false,
                'update_count_callback' => '_update_post_term_count',
                'label' => __('Tags', 'wpvenue'),
                'query_var' => true,
                'rewrite' => array( 'slug' => 'site_tags' )
    )) ;
}

/**
 * Flush your rewrite rules for custom post type and taxonomies added in theme
 */
function wpvenue_flush_rewrite_rules() {
    global $pagenow, $wp_rewrite;

    if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
        $wp_rewrite->flush_rules();
}

add_action( 'load-themes.php', 'wpvenue_flush_rewrite_rules' );