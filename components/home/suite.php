<?php
$image = get_sub_field('image');
$texte = get_sub_field('texte');
$texteSuite = get_sub_field('texte_suite');
?>

<section class="section home__suite" data-block-section>
    <div class="home__suite__texteSuite">
      <?= $texteSuite; ?>
    </div>
    <?php if ($image) { ?>
      <div class="image" id="soon">
        <?= getPictureMedia($image['id'], 'full'); ?>
      </div>
      <?php } ?>
    <div class="home__suite__texte">
      <?= $texte; ?>
    </div>
</section>
