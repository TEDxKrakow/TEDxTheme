<?php
class TEDxQuery {

  function sticky_posts($count = 5) {
    $sticky = get_option('sticky_posts');
    $q = new WP_Query([
      'posts_per_page' => $count,
      'post__in'       => $sticky,
    ]);
    return $q->posts;
  }

  function unsticky_posts($count = false) {
    $sticky       = get_option('sticky_posts');
    $per_page     = get_option('posts_per_page');
    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($count) {
      $per_page = $count;
    }
    $q = new WP_Query([
      'posts_per_page'      => $count,
      'ignore_sticky_posts' => 1,
      'post__not_in'        => $sticky,
      'paged'               => $current_page
    ]);
    return $q->posts;
  }

}

