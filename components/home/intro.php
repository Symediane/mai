<?php
$title = get_sub_field('title');
$video = get_sub_field('video');
$video_desktop = $video['video'];
$video_mobile = $video['video_mobile'];
$image = $video['image'];

if ($video_desktop || $image) { ?>
  <section class="section home home__intro video-container" data-block-section>
    <?php if ($video_desktop) { ?>
      <div class="video__desktop">
      <video autoplay src="<?= $video_desktop['url']; ?>" class="home__video" muted="" loop="" playsinline="">
          <track src="" kind="captions">
        </video>
        <div class="volume-controls home_audio">
          <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
          <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
        </div>
      </div>

      <div class="video__mobile">
        <video autoplay src="<?php
        if ($video_mobile) {
          echo $video_mobile['url'];
        } else {
          echo $video_desktop['url'];
        } ?>" class="home__video --mobile" muted="" loop="" playsinline="">
          <track src="" kind="captions">
        </video>
        <div class="volume-controls home_audio">
          <span class="mute-icon" id="mute-icon"><?= get_template_part('/components/svg/mute'); ?></span>
          <span class="unmute-icon" id="unmute-icon"><?= get_template_part('/components/svg/unmute'); ?></span>
        </div>
        </div>
      <?php } else { ?>
        <div class="image">
          <?= getPictureMedia($image['id'], 'full'); ?>
        </div>
      <?php } ?>
    <div class="home__intro__title">
      <?php if ($title) { ?>
        <h1 class="title"><?= $title ?></h1>
      <?php } ?>
    </div>
  </section>
<?php } ?>
