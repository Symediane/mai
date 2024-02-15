<?php
$title = get_field('contact')['titre'];
$texte = get_field('contact')['texte'];

if ($title || $texte) { ?>
  <div class="screenHeight">
    <div class="presse__content" id="contact">
      <div class="presse__content__title">
        <?= $title; ?>
      </div>
      <div class="presse__content__text">
        <?= $texte; ?>
      </div>
    </div>
  </div>
<?php } ?>