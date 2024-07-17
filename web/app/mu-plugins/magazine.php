<?php
// Register Custom Post Type
function magazine() {

    $labels = array(
        'name'                  => _x( 'Magazines', 'Post Type General Name', 'jdp' ),
        'singular_name'         => _x( 'Magazine', 'Post Type Singular Name', 'jdp' ),
        'menu_name'             => __( 'Magazines', 'jdp' ),
        'name_admin_bar'        => __( 'Magazines', 'jdp' ),
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
    $rewrite = array(
        'slug'                  => 'magazine',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Magazines', 'jdp' ),
        'description'           => __( 'Magazines', 'jdp' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'magazine', $args );

}
add_action( 'init', 'magazine', 0 );

function getMagazines($number)
{
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'magazine',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $data = getMagazineData($args);

    wp_reset_query();

    return $data;
}

function getMagazineByCategory($id)
{
    $args = array(
        'post_type' => 'magazine',
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'magazine',
                'field' => 'term_id',
                'terms' => $id,
            ),
        ),
    );

    $magazine_data = getMagazineData($args);
    $magazine = null;

    if ($magazine_data) {
        $magazine = $magazine_data[0];
    }

    wp_reset_query();

    return $magazine;
}

function getMagazineById($id)
{
    $args = array(
        'post_type' => 'magazine',
        'page_id' => $id,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
    );

    $magazine = getMagazineData($args);

    wp_reset_query();

    return $magazine;
}

function getMagazineData($args)
{
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $id = get_the_ID();
            $title = get_field('title');
            $permalink = get_the_permalink();
            $thumbnail = get_field('thumbnail');
            $excerpt = get_field('excerpt');
            $date_short = get_field('date');
            $date = get_field('date_string');
            $magazine = get_field('magazine');
            $recipes = get_field('thumbnails_recipes');
            $data[] = array(
                'id' => $id,
                'title' => $title,
                'thumbnail' => $thumbnail,
                'permalink' => $permalink,
                'excerpt' => $excerpt,
                'date_short' => $date_short,
                'date' => $date,
                'magazine' => $magazine,
                'recipes' => $recipes
            );
        }
        wp_reset_postdata();

        return $data;
    }
}

add_action('save_post_magazine', 'update_menu_item_url_with_latest_magazine', 10, 3);

function update_menu_item_url_with_latest_magazine($post_id, $post, $update) {
    if (!$update) {
        return;
    }

    // Query to get the latest published magazine post
    $latest_magazine_query = new WP_Query(array(
        'post_type'      => 'magazine',
        'posts_per_page' => 1,
        'orderby'        => 'publish_date',
        'order'          => 'DESC',
    ));

    if ($latest_magazine_query->have_posts()) {
        $latest_magazine_query->the_post();
        $latest_magazine_id = get_the_ID();
        $latest_magazine_url = get_permalink($latest_magazine_id);
        wp_reset_postdata();

        // ID of the menu item to update
        $menu_item_id = 355;

        // Update the menu item
        $menu_item_data = array(
            'ID' => $menu_item_id,
            'url' => $latest_magazine_url,
        );

        wp_update_nav_menu_item(0, $menu_item_data);
    }
}