<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */

get_header(); ?>
<div class="container">
  <div class="error404__title">404</div>
  <p class="page404__texte">
    <?= __("La page que vous recherchez n’existe pas ou une autre erreur s’est produite.", 'symediane'); ?>
  </p>
  <a href="<?= get_home_url(); ?>" class="btn">
    <?= __("Retour à l'accueil", 'symediane'); ?>
  </a>
</div>
<?php
get_footer();
