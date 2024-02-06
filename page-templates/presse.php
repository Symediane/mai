<?php

/**
 * Template Name: Presse
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */

get_header();
?>
  <div class="presse">
    <?php get_template_part('/components/presse/articles')?>
    <div class="list">
      <?php
        get_template_part('/components/presse/presse');
        get_template_part('/components/presse/podcast');
      ?>
    </div>
  </div>
<?php
