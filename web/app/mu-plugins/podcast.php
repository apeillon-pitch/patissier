<?php
// Register Custom Post Type
// Register Custom Post Type
function podcast() {

    $labels = array(
        'name'                  => _x( 'Podcasts', 'Post Type General Name', 'jdp' ),
        'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'jdp' ),
        'menu_name'             => __( 'Podcasts', 'jdp' ),
        'name_admin_bar'        => __( 'Podcasts', 'jdp' ),
        'archives'              => __( 'Item Archives', 'jdp' ),
        'attributes'            => __( 'Item Attributes', 'jdp' ),
        'parent_item_colon'     => __( 'Parent Item:', 'jdp' ),
        'all_items'             => __( 'All Items', 'jdp' ),
        'add_new_item'          => __( 'Add New Item', 'jdp' ),
        'add_new'               => __( 'Add New', 'jdp' ),
        'new_item'              => __( 'New Item', 'jdp' ),
        'edit_item'             => __( 'Edit Item', 'jdp' ),
        'update_item'           => __( 'Update Item', 'jdp' ),
        'view_item'             => __( 'View Item', 'jdp' ),
        'view_items'            => __( 'View Items', 'jdp' ),
        'search_items'          => __( 'Search Item', 'jdp' ),
        'not_found'             => __( 'Not found', 'jdp' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'jdp' ),
        'featured_image'        => __( 'Featured Image', 'jdp' ),
        'set_featured_image'    => __( 'Set featured image', 'jdp' ),
        'remove_featured_image' => __( 'Remove featured image', 'jdp' ),
        'use_featured_image'    => __( 'Use as featured image', 'jdp' ),
        'insert_into_item'      => __( 'Insert into item', 'jdp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'jdp' ),
        'items_list'            => __( 'Items list', 'jdp' ),
        'items_list_navigation' => __( 'Items list navigation', 'jdp' ),
        'filter_items_list'     => __( 'Filter items list', 'jdp' ),
    );
    $args = array(
        'label'                 => __( 'Podcast', 'jdp' ),
        'description'           => __( 'Podcasts', 'jdp' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'podcast',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'podcast', $args );

}
add_action( 'init', 'podcast', 0 );

function getPodcasts($number)
{
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'podcast',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $data = getPodcastData($args);

    wp_reset_query();

    return $data;
}


function getPodcastById($id)
{
    $args = array(
        'post_type' => 'podcast',
        'page_id' => $id,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
    );

    $podcast_data = getPodcastData($args);
    $podcast = null;

    if ($podcast_data) {
        $podcast = $podcast_data[0];
    }

    wp_reset_query();

    return $podcast;
}

function getPodcastData($args)
{
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $title = get_the_title();
            $thumbnail = get_field('thumbnail');
            $excerpt = get_field('excerpt');
            $data[] = array(
                'title' => $title,
                'thumbnail' => $thumbnail,
                'excerpt' => $excerpt,
            );
        }
        wp_reset_postdata();

        return $data;
    }
}