<?php
function get_articles($number) {
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
  );

  $data = get_article_data($args);

  wp_reset_query();

  return $data;
}

function get_article_data($args)
{
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $data[] = array(
        'permalink' => get_the_permalink(),
        'title' => get_the_title(),
        'date' => get_the_date('d/m/Y'),
      );
    }
  }

  return $data;
}

// Ajouter des règles de réécriture personnalisées pour les articles
function custom_rewrite_rules() {
    add_rewrite_rule(
        '^actualites/([^/]+)/?$',
        'index.php?name=$matches[1]&post_type=post',
        'top'
    );
}
add_action('init', 'custom_rewrite_rules');

// Modifier les permaliens des articles pour ajouter /actualites/
function custom_post_permalink($permalink, $post) {
    if ($post->post_type == 'post') {
        $permalink = home_url('/actualites/' . $post->post_name . '/');
    }
    return $permalink;
}
add_filter('post_link', 'custom_post_permalink', 10, 2);

// Flusher les règles de réécriture
function custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'custom_flush_rewrite_rules');

// Forcer un flush des règles lors de l'activation du plugin/thème
add_action('init', 'custom_flush_rewrite_rules');

