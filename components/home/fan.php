<?php
$image = get_sub_field('image');
$image_mobile = get_sub_field('image_mobile');
$texte = get_sub_field('texte');

if($image) {
?>
<section class="section fan" data-block-section>
  <div class="image<?= $image_mobile ? ' image__desktop' : '' ?>">
    <?= getPictureMedia($image['id'], 'full', ['mask' => false]); ?>
  </div>
  <?php if ($image_mobile) { ?>
    <div class="image__mobile">
      <?= getPictureMedia($image_mobile['id'], 'full', ['mask' => false]); ?>
    </div>
  <?php } ?>
  <?php if ($texte) { ?>
  <div class="fan__texte">
    <?= $texte; ?>
  </div>
  <?php } ?>
</section>
<?php } ?>