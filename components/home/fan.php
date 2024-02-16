<?php
$image = get_sub_field('image');
$texte = get_sub_field('texte');

if($image) {
?>
<section class="section fan" data-block-section>
  <?= getPictureMedia($image['id'], 'full', ['mask' => false]); ?>
  <?php if ($texte) { ?>
  <div class="fan__texte">
    <?= $texte; ?>
  </div>
  <?php } ?>
</section>
<?php } ?>