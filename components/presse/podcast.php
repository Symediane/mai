<?php
$podcast = get_field('podcast');

function comparePodcasts($a, $b) {
    return strcmp($a['magazine'], $b['magazine']);
}

usort($podcast, 'comparePodcasts');
?>

<div class="presse__podcast">
    <div class="presse__podcast__title">
        Podcast
    </div>
    <?php foreach ($podcast as $podcast_item) {
        $magazine = $podcast_item['magazine'];
        $titre = $podcast_item['titre']; 
        $lien_externe = $podcast_item['lien_externe'];
        ?>
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
