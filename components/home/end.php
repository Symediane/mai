<?php
$image = get_sub_field('image');
$texte = get_sub_field('texte');
$films = get_sub_field('films');
?>

<section class="section home__end" data-block-section>
  <div class="home__end__left">
    <div class="home__end__texte">
      <?= $texte; ?>
    </div>
    <?php if ($image) { ?>
      <div class="image">
        <?= getPictureMedia($image['id'], 'full'); ?>
      </div>
    <?php } ?>
  </div>
  <p class="home__end__films">
    <?php foreach ($films as $film_item) {
      $film = $film_item['film']; ?>
      <a href="<?= $film['url']; ?>" class="film" target="_blank">
        <?= $film['title']; ?>
      </a>
    <?php } ?>
    </p>
</section>
