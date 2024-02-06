<?php
/**
 *
 * @package WordPress
 * @subpackage Symediane
 * @since Symediane 1.0
 */
// We set the pixel ratio
$pixelRatio = 2;
/**
 * Declare the principal menu and the post thumbnail for posts/pages
 *
 * @since Symediane 1.0
 */
function symedianeSetup()
{
  // Enable support for Post Thumbnails.
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);

  // This theme uses wp_nav_menu().
  register_nav_menus([
    'main'   => __('Menu principal', 'symediane'),
    'secondaire'   => __('Menu principal secondaire', 'symediane'),
  ]);
}
add_action('after_setup_theme', 'symedianeSetup');

add_filter('xmlrpc_enabled', '__return_false');

function wpb_remove_version()
{
  return '';
}
add_filter('the_generator', 'wpb_remove_version');

remove_action("wp_head", "wp_generator");

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js($src)
{
  if (strpos($src, 'ver='))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('login_errors', function ($a) {
  return $null;
});

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Symediane 1.0
 */
function symedianeScripts()
{
  wp_enqueue_style('symediane-style', get_template_directory_uri() . '/dist/css/style.css', [], "");
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/js/app.js', [], "", true);
  wp_localize_script('app', 'ajax', [
    'ajaxUrl' => admin_url('admin-ajax.php')
  ]);
}
add_action('wp_enqueue_scripts', 'symedianeScripts', 11);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
/**
 * This function create all the website image size
 * declared in the $sizes table.
 * It automatically create the retina version of each
 * size with the set $pixelRatio.
 *
 * @since Symediane 1.0
 */
function new_image_size()
{
  global $pixelRatio;

  // This array contains all the different image sizes
  // that can be used on the website and for each size
  // all the site breakpoint
  $sizes = [
    'full' => [
      'xl' => [1920, 980, false],
      'lg' => [1536, 784, false],
      'md' => [1280, 654, false],
      'sm' => [1024, 530, false],
      'xs' => [768, 1536, false]
    ],
    'half' => [
      'xl' => [574, 840, false],
      'lg' => [494, 740, false],
      'md' => [494, 740, false],
      'sm' => [494, 740, false],
      'xs' => [768, 1536, false]
    ],
    'third' => [
      'xl' => [570, 730, false],
      'lg' => [430, 550, false],
      'md' => [310, 400, false],
      'sm' => [290, 370, false],
      'xs' => [290, 370, false]
    ],
  ];

  foreach ($sizes as $sizeName => $size) {
    foreach ($size as $srcKey => $srcset) {
      $crop = (isset($srcset[2])) ? $srcset[2] : false;

      add_image_size($sizeName . '_' . $srcKey, $srcset[0], $srcset[1], $crop);

      // Retina
      if ($pixelRatio > 0) {
        add_image_size(
          $sizeName . '_' . $srcKey . '_2x',
          ($srcset[0] * $pixelRatio),
          ($srcset[1] * $pixelRatio),
          $crop
        );
      }
    }
  }
}
add_action('init', 'new_image_size');
/**
 * Return the picture tag with all the breakpoint
 * We can add a mask for lazyloading
 *
 * @param   int         $imageId    the image Id
 * @param   string      $size       the image size
 * @param   boolean     $mask       if the image needs to have a mask for prevent content jumping during page loading
 * @param   boolean     $full       if the image have to be width 100% of the container ( False => EXPERIMENTAL)
 *
 * @return  string
 * @since Symediane 1.0
 */
function getPictureMedia($imageId, $size, $params = [])
{
  $mask = (isset($params['mask'])) ? $params['mask'] : true;
  $full = (isset($params['full'])) ? $params['full'] : true;
  $class = (isset($params['class'])) ? $params['class'] : '';

  // We check parameters
  if (!$imageId || !$size || !wp_get_attachment_image_src($imageId, $size . '_lg')) {
    return '';
  }

  // We get the alt of the image
  $altImage = get_post_meta($imageId, '_wp_attachment_image_alt', true);
  if (!$altImage) {
    $altImage = get_the_title($imageId);
  }

  // We calculate the ratio for each breakpoint
  $xlImage = wp_get_attachment_image_src($imageId, $size . '_xl');
  $xl2xImage = wp_get_attachment_image_src($imageId, $size . '_xl_2x');
  $xlRatio = ($xlImage[2] / $xlImage[1]) * 100;
  $xl2xRatio = ($xl2xImage[2] / $xl2xImage[1]) * 100;

  $lgImage = wp_get_attachment_image_src($imageId, $size . '_lg');
  $lg2xImage = wp_get_attachment_image_src($imageId, $size . '_lg_2x');
  $lgRatio = ($lgImage[2] / $lgImage[1]) * 100;
  $lg2xRatio = ($lg2xImage[2] / $lg2xImage[1]) * 100;

  $mdImage = wp_get_attachment_image_src($imageId, $size . '_md');
  $md2xImage = wp_get_attachment_image_src($imageId, $size . '_md_2x');
  $mdRatio = ($mdImage[2] / $mdImage[1]) * 100;
  $md2xRatio = ($md2xImage[2] / $md2xImage[1]) * 100;

  $smImage = wp_get_attachment_image_src($imageId, $size . '_sm');
  $sm2xImage = wp_get_attachment_image_src($imageId, $size . '_sm_2x');
  $smRatio = ($smImage[2] / $smImage[1]) * 100;
  $sm2xRatio = ($sm2xImage[2] / $sm2xImage[1]) * 100;

  $xsImage = wp_get_attachment_image_src($imageId, $size . '_xs');
  $xs2xImage = wp_get_attachment_image_src($imageId, $size . '_xs_2x');
  $xsRatio = ($xsImage[2] / $xsImage[1]) * 100;
  $xs2xRatio = ($xs2xImage[2] / $xs2xImage[1]) * 100;

  $classes = $class . ' ' . $size . '-pic';

  $xlWidth = '';
  $xl2xWidth = '';
  $lgWidth = '';
  $lg2xWidth = '';
  $mdWidth = '';
  $md2xWidth = '';
  $smWidth = '';
  $sm2xWidth = '';
  $xsWidth = '';
  $xs2xWidth = '';

  if ($mask) {
    $classes .= ' lazyload-box';
  }

  if (!$full) {
    global $pixelRatio;
    $classes .=     ' auto-width';
    // XL
    $xlWidth = 'width: ' . $xlImage[1] . 'px; ';
    if ($xl2xImage[1] > $xlImage[1]) { // If the image is not wide enough for retina
      $xl2xWidth = 'width: ' . ($xl2xImage[1] / $pixelRatio) . 'px; ';
    } else {
      $xl2xRatio = $xlRatio;
      $xl2xWidth = $xlWidth;
      $xl2xImage = $xlImage;
    }
    // LG
    $lgWidth = 'width: ' . $lgImage[1] . 'px; ';
    if ($lg2xImage[1] > $lgImage[1]) { // If the image is not wide enough for retina
      $lg2xWidth = 'width: ' . ($lg2xImage[1] / $pixelRatio) . 'px; ';
    } else {
      $lg2xRatio = $lgRatio;
      $lg2xWidth = $lgWidth;
      $lg2xImage = $lgImage;
    }
    // MD
    $mdWidth =      'width: ' . $mdImage[1] . 'px; ';
    if ($md2xImage[1] > $mdImage[1]) { // If the image is wide enough for retina
      $md2xWidth = 'width: ' . ($md2xImage[1] / $pixelRatio) . 'px; ';
    } else {
      $md2xWidth = $mdWidth;
      $md2xRatio = $mdRatio;
      $md2xImage = $mdImage;
    }
    // SM
    $smWidth =      'width: ' . $smImage[1] . 'px; ';
    if ($sm2xImage[1] > $smImage[1]) { // If the image is wide enough for retina
      $sm2xWidth = 'width: ' . ($sm2xImage[1] / $pixelRatio) . 'px; ';
    } else {
      $sm2xWidth = $smWidth;
      $sm2xRatio = $smRatio;
      $sm2xImage = $smImage;
    }
    // XS
    $xsWidth =      'width: ' . $xsImage[1] . 'px; ';
    if ($xs2xImage[1] > $xsImage[1]) { // If the image is wide enough for retina
      $xs2xWidth = 'width: ' . ($xs2xImage[1] / $pixelRatio) . 'px; ';
    } else {
      $xs2xWidth = $xsWidth;
      $xs2xRatio = $xsRatio;
      $xs2xImage = $xsImage;
    }
  }

  // We prepare the returned Html for each breakpoint
  $html = '';
  $html .=    '<picture class="' . $classes . '" >';
  $html .=    '<!--[if IE 9]><video style="display: none;><![endif]-->';
  $html .=    '<source
                          media=" (max-width: 767px) and (min-resolution: 144dpi),
                                  (max-width: 767px) and (-webkit-min-device-pixel-ratio: 1.5)"
                          data-srcset="' . $xs2xImage[0] . '" >';
  $html .=    '<source
                          media="(max-width: 767px)"
                          data-srcset="' . $xsImage[0] . '" >';
  $html .=    '<source
                          media=" (max-width: 1024px) and (min-resolution: 144dpi),
                                  (max-width: 1024px) and (-webkit-min-device-pixel-ratio: 1.5)"
                          data-srcset="' . $sm2xImage[0] . '" >';
  $html .=    '<source
                          media="(max-width: 1024px)"
                          data-srcset="' . $smImage[0] . '" >';
  $html .=    '<source
                          media=" (max-width: 1280px) and (min-resolution: 144dpi),
                                  (max-width: 1280px) and (-webkit-min-device-pixel-ratio: 1.5)"
                          data-srcset="' . $md2xImage[0] . '" >';
  $html .=    '<source
                          media="(max-width: 1280px)"
                          data-srcset="' . $mdImage[0] . '" >';
  $html .=    '<source
                          media=" (max-width: 1535px) and (min-resolution: 144dpi),
                                  (max-width: 1535px) and (-webkit-min-device-pixel-ratio: 1.5)"
                          data-srcset="' . $lg2xImage[0] . '" >';
  $html .=    '<source
                          media="(max-width: 1535px)"
                          data-srcset="' . $lgImage[0] . '" >';
  $html .=    '<source
                          media=" (min-width: 1536px) and (min-resolution: 144dpi),
                                  (min-width: 1536px) and (-webkit-min-device-pixel-ratio: 1.5)"
                          data-srcset="' . $xl2xImage[0] . '" >';
  $html .=    '<source
                          media="(min-width: 1536px)"
                          data-srcset="' . $xlImage[0] . '" >';
  $html .=    '<!--[if IE 9]></video><![endif]-->';
  $html .=    '<img loading="lazy"
                      src="' . $xlImage[0] . '"
                      class="lazyload"
                      alt="' . $altImage . '" width="' . $xlImage[1] . '" height="' . $xlImage[2] . '"
                      >';
  if ($mask) {
    $html .= '<div class="masks">';
    $html .= '<div class="mask mask-xl" style="' . $xlWidth . 'padding-bottom: ' . $xlRatio . '%;" ></div>';
    $html .= '<div class="mask mask-xl-2x" style="' . $xl2xWidth . 'padding-bottom: ' . $xl2xRatio . '%;" ></div>';

    $html .= '<div class="mask mask-lg" style="' . $lgWidth . 'padding-bottom: ' . $lgRatio . '%;" ></div>';
    $html .= '<div class="mask mask-lg-2x" style="' . $lg2xWidth . 'padding-bottom: ' . $lg2xRatio . '%;" ></div>';

    $html .= '<div class="mask mask-md" style="' . $mdWidth . 'padding-bottom: ' . $mdRatio . '%;" ></div>';
    $html .= '<div class="mask mask-md-2x" style="' . $md2xWidth . 'padding-bottom: ' . $md2xRatio . '%;" ></div>';

    $html .= '<div class="mask mask-sm" style="' . $smWidth . 'padding-bottom: ' . $smRatio . '%;" ></div>';
    $html .= '<div class="mask mask-sm-2x" style="' . $sm2xWidth . 'padding-bottom: ' . $sm2xRatio . '%;" ></div>';

    $html .= '<div class="mask mask-xs" style="' . $xsWidth . 'padding-bottom: ' . $xsRatio . '%;" ></div>';
    $html .= '<div class="mask mask-xs-2x" style="' . $xs2xWidth . 'padding-bottom: ' . $xs2xRatio . '%;" ></div>';
    $html .= '</div>';
  }
  $html .= '</picture>';

  return $html;
}

function getSvg($url)
{
  if ($url){
    $username = 'demo6';
    $password = 'symediane';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $svg = curl_exec($ch);
    curl_close($ch);
    return $svg;
  }
}


function removeCF7RecaptchaScript()
{
  if (is_page() || is_single() || is_home() || is_category() || is_tag()) {
    global $wp_query;
    $template_name = get_post_meta($wp_query->post->ID, '_wp_page_template', true);

    if ($template_name != 'page-templates/contact.php') {
      remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);
    }
  }
}
add_action('wp_head', 'removeCF7RecaptchaScript', 0);

add_filter('wpcf7_autop_or_not', '__return_false');
