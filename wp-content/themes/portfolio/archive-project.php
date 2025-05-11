<?php
// Add code here
$projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
]);

get_header(); ?>

    <h1>Mes projets</h1>

    <div class="filters__container">

    </div>
    <div class="projects__container">
        <?php if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
            <a class="projects__item" href="<?= get_page_link() ?>">
                <article class="projects__item__article">
                    <?php $image = get_field('project_thumbnail'); ?>
                    <h2 class="projects__item__title"><?= get_the_title(); ?></h2>
                    <div class="projects__item__effect"></div>
                    <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '370', 'height' => '209', 'class' => 'projects__item__img']); ?>
                </article>
            </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="/" class="inavlink inavlink--left">
        <span class="inavlink__text"><span class="inavlink__text--underlined">Retourner</span> à l’accueil</span>
    </a>

<?php get_footer() ?>