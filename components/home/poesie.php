<?php
$imageVideo = get_sub_field('image_video');
$image = $imageVideo['image'];
$video = $imageVideo['video'];
$poeme = get_sub_field('poeme');
?>

<?php if ($video || $image) { ?>
  <section class="section poesie home__poesie" data-block-section>
    <?php if ($video) { ?>
      <div class="video-container">
        <video autoplay controls src="<?= $video['url']; ?>" class="video" muted="" loop="" playsinline="">
          <track src="" kind="captions">
        </video>
      </div>
      <?php } else { ?>
        <div class="image">
          <?= getPictureMedia($image['id'], 'full'); ?>
        </div>
      <?php } ?>
    <div class="home__poesie__poeme">
      <?= $poeme; ?>
    </div>
  </section>
<?php } ?>
