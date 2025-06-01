<?php /* Template Name: Page "Homepage" */

$recent_projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
]);

    get_header(); ?>
<div class="home">

    <h1 class="home__title">
        <?php $logo = get_field('logo') ?>
        <img title="Neil Kreuer" src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" class="home__logo">
        <?= pll__('Web Developer') ?>
    </h1>
    <?php // TODO import SVG with it's frame (composed SVG tier 2) ?>
    <p class="home__content">
        <?= get_field('welcome'); ?>
    </p>
    <article class="home__bio">
        <h2 class="home__bio__title"><?= get_field('bio_title') ?></h2>
        <p class="home__bio__text"><?= get_field('bio_content') ?></p>
    </article>
</div>

<section class="tools" id="tools">
    <h2 class="tools__button__title">
        <label for="my-tools"
               class="tools__button" title="Afficher/masquer mes outils" tabindex="0">
            <?= pll__('My tools') ?>
        </label>
    </h2>
    <div class="tools__container">
        <input type="checkbox"
               id="my-tools"
               class="hidden-checkbox">
        <?php  if (have_rows('tools')): while (have_rows('tools')): the_row(); ?>
        <article class="tools__item">
            <h3 class="tools__title"><?= get_sub_field('title') ?></h3>
            <p class="tools__content"><?= get_sub_field('text_content') ?></p>
            <img class="tools__item__logo" src="<?= get_sub_field('logo')['url'] ?>" alt="<?= get_sub_field('logo')['alt'] ?>"
                 width="128px" height="128px">
        </article>
        <?php  endwhile; endif; ?>
    </div>
</section>

<section class="projects" id="projects">
    <h2 class="projects__title"><?= pll__('My projects') ?></h2>

    <div class="projects__container projects__container--suggest">
        <?php if ($recent_projects->have_posts()): while ($recent_projects->have_posts()): $recent_projects->the_post(); ?>
            <a class="projects__item" href="<?= get_page_link() ?>">
                <article class="projects__item__article">
                    <h3 class="projects__item__title"><?= get_the_title(); ?></h3>
                    <div class="projects__item__effect"></div>
                    <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '370px', 'height' => '209px', 'class' => 'projects__item__img']); ?>
                </article>
            </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="/projects" class="inavlink inavlink--right">
        <span class="inavlink__text"><?= pll__('See') ?> <span
                    class="inavlink__text--underlined"><?= pll__('all my projects')?></span></span>
    </a>
</section>

<div id="contact">
    <section class="links" id="my-links">
        <h2 class="links__title"><?= pll__('My links')?></h2>
        <div class="links__div">
            <p class="links__text"><?= pll__("If you want to see more, there are my links to my accounts:") ?></p>
            <ul class="links__container">
                <li class="links__li">
                    <a title="Vers ma page GitHub" href="https://github.com/Kreuer-Neil"
                       class="links__link icon icon__github">Mon GitHub</a>
                </li>
                <li class="links__li">
                    <a title="Vers mon profil BlueSky pro" href="https://bsky.app/profile/neil-kreuer.be"
                       class="links__link icon icon__bluesky">Mon profil Bluesky de développeur</a>
                </li>
            </ul>
        </div>
        <div class="links__div">
            <p><?= pll__('Contact me') ?></p>
            <p class="links__data">neil.kreuer@student.hepl.be</p>
        </div>
    </section>

    <section class="contact">
        <h2 class="contact__title"><?= pll__('Contact me directly') ?></h2>
        <?php //TODO faire le formulaire ?>
    </section>
</div>

<?php get_footer(); ?>
