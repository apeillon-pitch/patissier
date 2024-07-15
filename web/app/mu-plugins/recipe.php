<?php
// Register Custom Post Type
function recipe() {

    $labels = array(
        'name'                  => _x( 'Recettes', 'Post Type General Name', 'jdp' ),
        'singular_name'         => _x( 'Recette', 'Post Type Singular Name', 'jdp' ),
        'menu_name'             => __( 'Recettes', 'jdp' ),
        'name_admin_bar'        => __( 'Recettes', 'jdp' ),
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
        'label'                 => __( 'Recettes', 'jdp' ),
        'description'           => __( 'Recettes', 'jdp' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'recettes',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'recipe', $args );

}
add_action( 'init', 'recipe', 0 );

// Register Custom Taxonomy
function magazineTaxonomy() {

    $labels = array(
        'name'                       => _x( 'Magazines', 'Taxonomy General Name', 'jdp' ),
        'singular_name'              => _x( 'Magazine', 'Taxonomy Singular Name', 'jdp' ),
        'menu_name'                  => __( 'Magazine', 'jdp' ),
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
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'magazine', array( 'recipe', 'magazine' ), $args );

}
add_action( 'init', 'magazineTaxonomy', 0 );

function getRecipes($number)
{
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'recipe',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $data = getRecipeData($args);

    wp_reset_query();

    return $data;
}

function getLastRecipeByTag( $tag)
{
    $args = array(
        'post_type' => 'recipe',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'tag_id' => $tag
    );

    $data = getRecipeData($args);

    wp_reset_query();

    return $data;
}


function getRecipeById($id)
{
    $args = array(
        'post_type' => 'recipe',
        'page_id' => $id,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
    );

    $recipe_data = getRecipeData($args);
    $recipe = null;

    if ($recipe_data) {
        $recipe = $recipe_data[0];
    }

    wp_reset_query();

    return $recipe;
}

function getRecipeData($args)
{
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $title = get_the_title();
            $permalink = get_the_permalink();
            $thumbnail = get_field('thumbnail');
            $author = get_field('author_group');
            $excerpt = get_field('excerpt');
            $tag = get_field('tag');
            $data[] = array(
                'title' => $title,
                'thumbnail' => $thumbnail,
                'excerpt' => $excerpt,
                'permalink' => $permalink,
                'author' => $author,
                'tag' => $tag,
            );
        }
        wp_reset_postdata();

        return $data;
    }
}