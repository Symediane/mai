<?php

/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */

get_header();
?>
<div id="main-content" class="main-content">
  <div class="wrap" data-scroll-section>
    <div class="black-bar top-bar"></div>
    <?php if (have_rows('blocs')) {
      while (have_rows('blocs')) {
        the_row();
        $layout = get_row_layout();
        if ($layout === 'intro') {
          get_template_part('/components/home/intro');
        } elseif ($layout === 'presentation') {
          get_template_part('/components/home/presentation');
        } elseif ($layout === 'rivieres') {
          get_template_part('/components/home/rivieres');
        } elseif ($layout === 'video_and_poster') {
          get_template_part('/components/home/videoPoster');
        } elseif ($layout === 'jerry') {
          get_template_part('/components/home/jerry');
        } elseif ($layout === 'make_me_rain') {
          get_template_part('/components/home/makeMeRain');
        } elseif ($layout === 'suite') {
          get_template_part('/components/home/suite');
        } elseif ($layout === 'poesie') {
          get_template_part('/components/home/poesie');
        } elseif ($layout === 'end') {
          get_template_part('/components/home/end');
        }
      }
    }
    ?>
    <div class="black-bar bottom-bar"></div>
  </div>
</div>
<?php
get_footer();