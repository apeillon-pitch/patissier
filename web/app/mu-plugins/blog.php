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
