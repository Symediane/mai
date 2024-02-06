<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */
$post_thumbnail_id = get_post_thumbnail_id();

get_header();
$_top = false;
get_template_part('/components/introduction');

echo '<div class="container__small">';
  echo '<div class="blocs__slider blocs__bloc">';
    echo '<div class="featured-image">';
      if ($post_thumbnail_id) {
          echo getPictureMedia($post_thumbnail_id, 'third');
        } else {
          echo '<p>Aucune image disponible</p>';
      }
      echo '</div>';
  echo '</div>';
echo '</div>';


echo '<div class="blocs__single">';
if (get_the_content()) {
    get_template_part('/components/content', '', ['_top' => $_top]);
} else {
    $_top = false;
}
get_template_part('/components/page/sections', '', ['_top' => $_top]);
get_template_part('/components/single/sharing');
echo '</div>';

echo '<div class="blocs__selection">';
get_template_part('/components/single/selection');
echo '</div>';

get_footer();
