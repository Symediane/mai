<?php
$imageVideo = get_sub_field('image_video');
$image = $imageVideo['image'];
$video = $imageVideo['video'];
$lien_externe = $imageVideo['lien_externe'];
$poster = get_sub_field('poster');
$textes = get_sub_field('textes');
$title = $textes['titre'];
$liens = $textes['liens'];
$texteSuite = get_sub_field('texte');
?>

<section class="section home__videoPoster" data-block-section>
  <div class="home__container videoPoster">
    <?php if ($video || $image) { ?>
      <div class="imagesVideo">
        <?php if ($video) { ?>
          <?php if (!empty($lien_externe['url'])) { ?>
            <a href="<?= esc_url($lien_externe['url']); ?>" class="video-container" target="_blank">
          <?php } else { ?>
            <div class="video-container">
          <?php } ?>
            <video autoplay controls src="<?= $video['url']; ?>" class="video" muted="" loop="" playsinline="">
              <track src="" kind="captions">
            </video>
          <?php if (!empty($lien_externe['url'])) { ?>
            </a>
          <?php } else { ?>
            </div>
          <?php } ?>
        <?php } else { ?>
          <?php if (!empty($lien_externe['url'])) { ?>
            <a href="<?= esc_url($lien_externe['url']); ?>" class="image" target="_blank">
          <?php } else { ?>
            <div class="image">
          <?php } ?>
            <?= getPictureMedia($image['id'], 'full'); ?>
          <?php if (!empty($lien_externe['url'])) { ?>
            </a>
          <?php } else { ?>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
    <div class="home__videoPoster__posterTexte">
      <div class="image">
        <?= getPictureMedia($poster['id'], 'full'); ?>
      </div>
      <div class="liens">
        <div class="title">
          <?= $title; ?>
        </div>
        <?php foreach ($liens as $lien) {
          $texte = $lien['texte_lien'];
          $file = $lien['fichier'];
          $mobile = $lien['version_mobile'];
          ?>
          <?php if (!empty($file['url'])) { ?>
            <a href="<?= esc_url($file['url']); ?>" class="<?= !empty($mobile['url']) ? 'lien__desktop ' : ''; ?>lien" target="_blank"><?= $texte; ?> </a>
          <?php } ?>
          <?php if (!empty($mobile['url'])) { ?>
            <a href="<?= esc_url($mobile['url']); ?>" class="lien__mobile lien" target="_blank"><?= $texte; ?> </a>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="texte">
    <?= $texteSuite; ?>
  </div>
</section>
