<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */

get_header(); ?>
<div class="cms container">
  <div class="cms__content">
    <h1><?php the_title(); ?></h1>
    <?php
    while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php
    endwhile;
    ?>
  </div>
</div>
<?php
get_footer();