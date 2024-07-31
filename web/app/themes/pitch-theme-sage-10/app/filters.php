<?php

/**
 * Theme filters.
 */

namespace App;

use WP_Query;


/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('get_the_archive_title_prefix','__return_false');

add_filter('wp_nav_menu_objects', function ($items, $args) {
    // ID de l'item de menu à modifier
    $menu_item_id_to_update = 411;

    // Requête pour obtenir le dernier magazine publié
    $latest_magazine_query = new WP_Query(array(
        'post_type'      => 'magazine',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($latest_magazine_query->have_posts()) {
        $latest_magazine_query->the_post();
        $latest_magazine_url = get_permalink(get_the_ID());
        wp_reset_postdata();

        // Parcourir les éléments de menu pour trouver celui à modifier
        foreach ($items as $item) {
            if ($item->ID == $menu_item_id_to_update) {
                // Mettre à jour l'URL de l'item de menu
                $item->url = $latest_magazine_url;
            }
        }
    }

    return $items;
}, 10, 2);
