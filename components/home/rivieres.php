<?php
$first_block = get_sub_field('premier_block');
$firstTexte = $first_block['texte'];
$imagesRepeteur = $first_block['image_video'];

$second_block = get_sub_field('second_block');
$secondTexte = $second_block['texte'];
$imagesGroup = $second_block['images_videos'];

$video = $imagesGroup['video'];
$linksGroup = $imagesGroup['lien_externe'];
$image = $imagesGroup['image'];
?>

<section class="section rivieres home__rivieres" data-block-section>
  <div class="home__container">
    <div class="home__rivieres__firstBlock">
      <div class="flex">
        <div class="texte">
          <?= $firstTexte; ?>
        </div>
        <div class="imagesVideo">
          <?php
            foreach ($imagesRepeteur as $imageVideo) {
              $imageId = $imageVideo['image'];
              $videoId = $imageVideo['video'];
              $linkRepeater = $imageVideo['lien_externe'];
              if ($videoId) {
                $videoUrl = wp_get_attachment_url($videoId); ?>
                <?php if (!empty($linkRepeater['url'])) { ?>
                  <a href="<?= esc_url($linkRepeater['url']); ?>" class="video-container" target="_blank">
                <?php } else { ?>
                  <div class="video-container">
                <?php } ?>
                  <video src="<?= $videoUrl; ?>" class="video" muted="" loop="" playsinline="">
                    <track src="" kind="captions">
                  </video>
                  <div class="volume-controls">
                    <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
                    <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
                  </div>
                <?php if (!empty($linkRepeater['url'])) { ?>
                  </a>
                <?php } else { ?>
                  </div>
                <?php } ?>
              <?php } elseif ($imageId) { ?>
                <?php if (!empty($linkRepeater['url'])) { ?>
                  <a href="<?= esc_url($linkRepeater['url']); ?>" class="image" target="_blank">
                <?php } else { ?>
                  <div class="image">
                <?php } ?>
                  <?= getPictureMedia($imageId, 'full'); ?>
                <?php if (!empty($linkRepeater['url'])) { ?>
                  </a>
                <?php } else { ?>
                  </div>
                <?php } ?>
              <?php }
            } ?>
        </div>
      </div>
    </div>
    <div class="home__rivieres__secondBlock">
      <div class="flex">
        <div class="texte">
          <?= $secondTexte; ?>
        </div>
        <?php if ($video || $image) { ?>
          <div class="imagesVideo">
            <?php if ($video) { ?>
              <?php if (!empty($linksGroup['url'])) { ?>
                <a href="<?= esc_url($linksGroup['url']); ?>" class="video-container" target="_blank">
              <?php } else { ?>
                <div class="video-container">
              <?php } ?>
                <video src="<?= $video['url']; ?>" class="video" muted="" loop="" playsinline="">
                  <track src="" kind="captions">
                </video>
                <div class="volume-controls">
                  <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
                  <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
                </div>
              <?php if (!empty($linksGroup['url'])) { ?>
                </a>
              <?php } else { ?>
                </div>
              <?php } ?>
            <?php } else { ?>
              <?php if (!empty($linksGroup['url'])) { ?>
                <a href="<?= esc_url($linksGroup['url']); ?>" class="image" target="_blank">
              <?php } else { ?>
                <div class="image">
              <?php } ?>
                <?= getPictureMedia($image['id'], 'full'); ?>
              <?php if (!empty($linksGroup['url'])) { ?>
                </a>
              <?php } else { ?>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
