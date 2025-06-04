<?php /* Template Name: Page "Projects" */

get_header();

$projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
//    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<div class="projects">
    <h1><?= pll__('My projects') ?></h1>
<?php /* if ($terms = get_terms()): // TODO Faire request en AJAX ? ?>
    <div class="filters">
        <p class="filters__title">Filtres</p>
        <ul class="filters__container">
            <?php foreach ($terms as $term): ?>
            <li class="filters__li"><a href="<?= '' // '?type='.$term['slug'] ?>" class="filters__item">
                    <?= $term->name ?>
                </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; */ ?>
    <div class="projects__container">
        <?php if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
            <a class="projects__item" href="<?= get_page_link() ?>">
                <article class="projects__item__article">
                    <?php $image = get_field('project_thumbnail'); ?>
                    <h2 class="projects__item__title"><?= get_the_title(); ?></h2>
                    <div class="projects__item__effect"></div>
                    <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '720', 'height' => '405', 'class' => 'projects__item__img']); ?>
                </article>
            </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="<?= get_home_url() ?>" class="inavlink inavlink--left">
        <span class="inavlink__text"><span class="inavlink__text--underlined"><?= pll__('Back') ?></span> <?= pll__('home') ?></span>
    </a>
</div>

<?php get_footer() ?>
