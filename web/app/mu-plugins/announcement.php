<?php
// Register Custom Post Type
function announcement() {

    $labels = array(
        'name'                  => _x( 'Petites annonces', 'Post Type General Name', 'jdp' ),
        'singular_name'         => _x( 'Petite annonce', 'Post Type Singular Name', 'jdp' ),
        'menu_name'             => __( 'Petites annonces', 'jdp' ),
        'name_admin_bar'        => __( 'Petites annonces', 'jdp' ),
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
        'label'                 => __( 'Petites annonces', 'jdp' ),
        'description'           => __( 'Petites annonces', 'jdp' ),
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
        'has_archive'           => 'petites-annonces',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'announcement', $args );

}
add_action( 'init', 'announcement', 0 );

function getAnnouncements($number)
{
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'announcement',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $data = getAnnouncementData($args);

    wp_reset_query();

    return $data;
}

// Register Custom Taxonomy
function announcementTaxonomy() {

    $labels = array(
        'name'                       => _x( 'Types d\'annonces', 'Taxonomy General Name', 'jdp' ),
        'singular_name'              => _x( 'Type d\'annonces', 'Taxonomy Singular Name', 'jdp' ),
        'menu_name'                  => __( 'Types d\'annonces', 'jdp' ),
        'all_items'                  => __( 'All Items', 'jdp' ),
        'parent_item'                => __( 'Parent Item', 'jdp' ),
        'parent_item_colon'          => __( 'Parent Item:', 'jdp' ),
        'new_item_name'              => __( 'New Item Name', 'jdp' ),
        'add_new_item'               => __( 'Add New Item', 'jdp' ),
        'edit_item'                  => __( 'Edit Item', 'jdp' ),
        'update_item'                => __( 'Update Item', 'jdp' ),
        'view_item'                  => __( 'View Item', 'jdp' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'jdp' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'jdp' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jdp' ),
        'popular_items'              => __( 'Popular Items', 'jdp' ),
        'search_items'               => __( 'Search Items', 'jdp' ),
        'not_found'                  => __( 'Not Found', 'jdp' ),
        'no_terms'                   => __( 'No items', 'jdp' ),
        'items_list'                 => __( 'Items list', 'jdp' ),
        'items_list_navigation'      => __( 'Items list navigation', 'jdp' ),
    );
    $rewrite = array(
        'slug'                       => 'type-annonce',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'taxo-announcement', array( 'announcement' ), $args );

}
add_action( 'init', 'announcementTaxonomy', 0 );


function getAnnouncementById($id)
{
    $args = array(
        'post_type' => 'announcement',
        'page_id' => $id,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
    );

    $announcement_data = getAnnouncementData($args);
    $announcement = null;

    if ($podcast_data) {
        $announcement = $announcement_data[0];
    }

    wp_reset_query();

    return $announcement;
}

function getAnnouncementData($args)
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