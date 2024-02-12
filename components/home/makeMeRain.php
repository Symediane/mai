<?php
$first_block = get_sub_field('premier_block');
$firstTexte = $first_block['texte'];
$imagesGroupOne = $first_block['image_video'];
$videoOne = $imagesGroupOne['video'];
$imageOne = $imagesGroupOne['image'];
$lien_externeOne = $imagesGroupOne['lien_externe'];

$second_block = get_sub_field('second_block');
$secondTexte = $second_block['texte'];
$imagesGroupTwo = $second_block['image_video'];
$videoTwo = $imagesGroupTwo['video'];
$imageTwo = $imagesGroupTwo['image'];
$lien_externeTwo = $imagesGroupTwo['lien_externe'];

$troisieme_block = get_sub_field('troisieme_block');
$troisiemeTexte = $troisieme_block['texte'];
$imagesGroupThird = $troisieme_block['image_video'];
$videoThird = $imagesGroupThird['video'];
$imageThird= $imagesGroupThird['image'];
$lien_externeThird = $imagesGroupThird['lien_externe'];
$link = $troisieme_block['lien'];
?>

<section class="section makeMe home__makeMe" data-block-section>
  <div class="home__makeMe__firstBlock">
    <div class="flex">
      <div class="texte">
        <?= $firstTexte; ?>
      </div>
      <?php if ($videoOne || $imageOne) { ?>
        <div class="imageVideo">
          <?php if ($videoOne) { ?>
            <?php if (!empty($lien_externeOne['url'])) { ?>
              <a href="<?= esc_url($lien_externeOne['url']); ?>"class="video-container">
            <?php } else { ?>
              <div class="video-container">
            <?php } ?>
              <video src="<?= $videoOne['url']; ?>" class="video" muted="" loop="" playsinline="">
                <track src="" kind="captions">
              </video>
              <div class="volume-controls">
                <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
                <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
              </div>
            <?php if (!empty($lien_externeOne['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } else { ?>
            <?php if (!empty($lien_externeOne['url'])) { ?>
              <a href="<?= esc_url($lien_externeOne['url']); ?>" class="image">
            <?php } else { ?>
              <div class="image">
            <?php } ?>
              <?= getPictureMedia($imageOne['id'], 'full'); ?>
            <?php if (!empty($lien_externeOne['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php }  ?>
    </div>
  </div>
  <div class="home__makeMe__secondBlock">
    <div class="flex">
      <div class="texte">
        <?= $secondTexte; ?>
      </div>
      <?php if ($videoTwo || $imageTwo) { ?>
        <div class="imageVideo">
          <?php if ($videoTwo) { ?>
            <?php if (!empty($lien_externeTwo['url'])) { ?>
              <a href="<?= esc_url($lien_externeTwo['url']); ?>"class="video-container">
            <?php } else { ?>
              <div class="video-container">
            <?php } ?>
              <video src="<?= $videoTwo['url']; ?>" class="video" muted="" loop="" playsinline="">
                <track src="" kind="captions">
              </video>
              <div class="volume-controls">
                <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
                <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
              </div>
            <?php if (!empty($lien_externeTwo['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } else { ?>
            <?php if (!empty($lien_externeTwo['url'])) { ?>
              <a href="<?= esc_url($lien_externeTwo['url']); ?>" class="image">
            <?php } else { ?>
              <div class="image">
            <?php } ?>
              <?= getPictureMedia($imageTwo['id'], 'full'); ?>
            <?php if (!empty($lien_externeTwo['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="home__makeMe__thirdBlock">
    <div class="flex">
      <?php if ($videoThird || $imageThird) { ?>
        <div class="imageVideo">
          <?php if ($videoThird) { ?>
            <?php if (!empty($lien_externeThird['url'])) { ?>
              <a href="<?= esc_url($lien_externeThird['url']); ?>"class="video-container">
            <?php } else { ?>
              <div class="video-container">
            <?php } ?>
              <video src="<?= $videoThird['url']; ?>" class="video" muted="" loop="" playsinline="">
                <track src="" kind="captions">
              </video>
              <div class="volume-controls">
                <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
                <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
              </div>
            <?php if (!empty($lien_externeThird['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } else { ?>
            <?php if (!empty($lien_externeThird['url'])) { ?>
              <a href="<?= esc_url($lien_externeThird['url']); ?>" class="image">
            <?php } else { ?>
              <div class="image">
            <?php } ?>
              <?= getPictureMedia($imageThird['id'], 'full'); ?>
            <?php if (!empty($lien_externeThird['url'])) { ?>
              </a>
            <?php } else { ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="title">
        <div class="texte">
          <?= $troisiemeTexte; ?>
        </div>
      </div>
    </div>
    <div class="link">
          <?= $link; ?>
        </div>
  </div>
</section>
