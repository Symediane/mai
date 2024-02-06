<?php
// Template de la page de catégorie (category.php)

get_header();


// Récupérer la catégorie actuelle
$current_category = get_queried_object();

// Afficher l'introduction

// Nouvelle requête pour récupérer les articles de la catégorie actuelle
$posts = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'suppress_filters' => 0,
));
?>

<section class="container pageblog">
    <div class="pageblog__list">
        <?php if ($posts->have_posts()) { ?>
            <?php while ($posts->have_posts()) {
                $posts->the_post();
                get_template_part('/components/post');
            } ?>
        </div>
        <div class="pagination">
            <?php
            $paginate = paginate_links(array(
                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'total'     => $posts->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
                'format'    => '?paged=%#%',
                'show_all'  => false,
                'type'      => 'plain',
                'end_size'  => 2,
                'mid_size'  => 1,
                'prev_next' => true,
                'prev_text' => '<div class="prev"></div>',
                'next_text' => '<div class="next"></div>',
                'add_args'  => false,
                'add_fragment' => '',
            ));
            echo $paginate;
            ?>
        </div>
    <?php } else { ?>
        <?= __("Il n'y a plus d'articles.", 'symediane'); ?>
    <?php } ?>
</section>

<?php
get_footer();
