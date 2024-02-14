<?php
$imageVideo = get_sub_field('image_video');
$image = $imageVideo['image'];
$video = $imageVideo['video'];
$lien_externe = $imageVideo['lien_externe'];
$texte = get_sub_field('texte');
$source = get_sub_field('source');
?>

<section class="section home__jerry" data-block-section>
  <div class="home__container jerry">
    <?php if ($video || $image) { ?>
      <div class="imagesVideo">
        <?php if ($video) { ?>
          <a href="<?= isset($lien_externe['url']) ? esc_url($lien_externe['url']) : ''; ?>" class="video-container" target="_blank">
            <video src="<?= $video['url']; ?>" class="video" muted="" loop="" playsinline="">
              <track src="" kind="captions">
            </video>
            <div class="volume-controls">
              <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
              <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
            </div>
          </a>
        <?php } else { ?>
          <a href="<?= isset($lien_externe['url']) ? esc_url($lien_externe['url']) : ''; ?>" class="image" target="_blank">
            <?= getPictureMedia($image['id'], 'full'); ?>
          </a>
        <?php } ?>
      </div>
    <?php } ?>
    <div class="home__jerry__content">
      <?php if ($texte) { ?>
        <div class="texte">
          <?= $texte; ?>
        </div>
      <?php } ?>
      <?php if ($source) { ?>
        <div class="source">
          <?= $source; ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
