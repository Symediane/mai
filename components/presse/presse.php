<?php 
$presse = get_field('presse');

function compareMagazines($a, $b) {
    return strcmp($a['magazine'], $b['magazine']);
}

usort($presse, 'compareMagazines');
?>

<div class="presse__presse">
    <div class="presse__presse__title">
        Presse
    </div>
    <?php foreach ($presse as $press) {
        $magazine = $press['magazine'];
        $titre = $press['titre']; 
        $lien_externe = $press['lien_externe']; ?>
        <?php if (isset($lien_externe['url']) && $lien_externe['url']) { ?>
            <a href="<?= esc_url($lien_externe['url']); ?>" target="_blank" class="flex">
        <?php } else { ?>
            <div class="flex">
        <?php } ?>
        <?php if ($magazine) { ?>
            <div class="magazine">
                <?= $magazine; ?>
            </div>
        <?php } ?>
        <?php if ($magazine && $titre) { ?>
            <div class="points"></div>
        <?php } ?>
        <?php if ($titre) { ?>
            <div class="titre">
                <?= $titre; ?>
            </div>
        <?php } ?>
        <?php if (isset($lien_externe['url']) && $lien_externe['url']) { ?>
            </a>
        <?php } else { ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>
