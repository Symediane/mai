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
    $lien = $press['lien_externe'];
    $fichier = $press['fichier'];
    if ($lien || $fichier) { ?>
        <a href="<?= $lien ? $lien : $fichier['url'] ?>" target="_blank" class="flex">
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
        </a>
    <?php } ?>
<?php } ?>
</div>
