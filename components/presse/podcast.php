<?php
$podcast = get_field('podcast');

function comparePodcasts($a, $b) {
    return strcmp($a['magazine'], $b['magazine']);
}

usort($podcast, 'comparePodcasts');
?>

<div class="presse__content">
    <div class="presse__content__title">
        <?= __("Podcast", 'symediane'); ?>
    </div>
    <?php foreach ($podcast as $podcast_item) {
    $magazine = $podcast_item['magazine'];
    $titre = $podcast_item['titre'];
    $lien = $podcast_item['lien_externe'];
    $fichier = $podcast_item['fichier'];
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
