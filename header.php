<?php if (preg_match('/[A-Z]/', $_SERVER['REQUEST_URI'])) {
  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
  $link .= $_SERVER['HTTP_HOST'];
  $link .= $_SERVER['REQUEST_URI'];
  header('HTTP/1.1 301');
  header('Location: ' . strtolower($link));
  exit();
}
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */
$enable_horizontal_scroll = true;
if (is_page(20)) {
    $enable_horizontal_scroll = false;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
  <?php wp_head(); ?>
  <?php if (is_user_logged_in()) { ?>
  <style>
  html {
    margin-top: 0 !important;
  }

  * html body {
    margin-top: 0 !important;
  }

  #wpadminbar {
    display: none;
    top: unset;
    bottom: 0;
    transition: 0.3s all;
  }

  @media screen and (max-width: 782px) {
    html {
      margin-top: 0 !important;
    }

    * html body {
      margin-top: 0 !important;
    }

    #wpadminbar {
      display: none;
    }
  }
  </style>
  <?php } ?>
</head>

<body <?php body_class(); ?>>
  <?php
    $preheader = get_field('preheader', 'option');
    $phone = get_field('phone', 'option');
    $lien_contact = get_field('lien_contact', 'option');
  ?>
  <main<?= $enable_horizontal_scroll ? " data-scroll-container" : "" ?>>
  <div id="main-content" class="main-content">
  <header class="header" >
    <div class="header__content container">
      <div class="header__left">
        <button class="header__burger" aria-label="Menu">
          <span class="icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>
      </div>
      <div class="header__menu">
        <nav>
          <div class="header__menu__top">
            <div class="header__close"></div>
            <div class="header__menu__top__btn"></div>
          </div>
            <div class="header__menu__menuOne" data-block-section>
              <?php wp_nav_menu(['theme_location' => 'main', 'menu_class' => 'header__menu__nav', 'container' => false]); ?>
              <a href="<?= get_home_url(); ?>">mai</a>
              <?php wp_nav_menu(['theme_location' => 'secondaire', 'menu_class' => 'header__menu__nav --secondary', 'container' => false]); ?>
            </div>
        </nav>
      </div>
    </div>
  </header>

