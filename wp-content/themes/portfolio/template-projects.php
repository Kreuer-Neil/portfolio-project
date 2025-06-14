<?php /* Template Name: Page "Projects" */
global $post;
get_header(); ?>

<div class="projects">
    <h1><?= get_the_title() ?></h1>
    <?php
    if ($terms = get_terms('project_type')): // TODO Faire request en AJAX ?
        ?>
        <div class="filters">
            <p class="filters__title">Filtres</p>
            <ul class="filters__container">
                <li class="filters__li"><a href="?" class="filters__item">
                        <?= pll__('All') ?>
                    </a></li>
                <?php foreach ($terms as $term): ?>
                    <li class="filters__li"><a href="<?= '?type='.$term->slug ?>" class="filters__item">
                            <?= $term->name ?>
                        </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php
    if (isset($_GET['type'])) {
        $projects = new WP_Query([
            'post_type' => 'project',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'project_type',
                    'field' => 'slug',
                    'terms' => [
                        $_GET['type']
                    ],
                    'include_children' => true,
                    'operator' => 'IN'
                ]
            ],
        ]);
    } else {
        $projects = new WP_Query([
            'post_type' => 'project',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

    }
    if ($projects->have_posts()): ?>
        <div class="projects__container">
            <?php while ($projects->have_posts()): $projects->the_post(); ?>
                <a class="projects__item" href="<?= portfolio_get_translation_string('projects', $post->post_name) ?>">
                    <article class="projects__item__article">
                        <?php $image = get_field('project_thumbnail'); ?>
                        <h2 class="projects__item__title"><?= get_the_title(); ?></h2>
                        <div class="projects__item__effect"></div>
                        <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '720', 'height' => '405', 'class' => 'projects__item__img']); ?>
                    </article>
                </a>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p class="empty"><?= pll__('No projects found') ?></p>
    <?php endif; ?>
    <a href="<?= get_home_url() ?>" class="inavlink inavlink--left">
        <span class="inavlink__text"><span
                    class="inavlink__text--underlined"><?= pll__('Back') ?></span> <?= pll__('home') ?></span>
    </a>
</div>

<?php get_footer() ?>
