<?php
$image = get_sub_field('image');
$texte = get_sub_field('texte');
?>

<section class="section pres home__presentation"data-block-section>
  <div class="home__presentation__flex">
    <div class="home__presentation__flex__image">
      <?= getPictureMedia($image['id'], 'full'); ?>
    </div>
    <div class="home__presentation__texte">
      <?= $texte; ?>
    </div>
  </div>
</section>
