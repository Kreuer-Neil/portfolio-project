<?php

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
        <svg class="home__logo" title="Neil Kreuer" alt="Neil Kreuer"
             width="180" height="127" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 127" id="logo-colored">
            <path fill="url(#a)" d="M168 0h-63.5v62.5L168 0ZM104.5 88.707V127H168l-53-46.5-10.5 8.207Z"/>
            <path fill="url(#b)" d="M127.5 67.5 180 114V13l-52.5 54.5Z"/>
            <path fill="url(#c)" d="M85.5 95V0H21l64.5 95ZM19 30v97h65L19 30Z"/>
            <defs>
                <linearGradient id="a" x1="104.5" x2="168" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FC76FA"/>
                    <stop offset="1" stop-color="#A516FA"/>
                </linearGradient>
                <linearGradient id="b" x1="127.5" x2="180" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FC76FA"/>
                    <stop offset="1" stop-color="#A516FA"/>
                </linearGradient>
                <linearGradient id="c" x1="85.5" x2="21" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FEC552"/>
                    <stop offset="1" stop-color="#FF6A1A"/>
                </linearGradient>
            </defs>
        </svg>
        Développeur Web
    </h1>
    <?php // TODO import SVG with it's frame (composed SVG tier 2) ?>
    <p class="home__content">
        <?= get_field('welcome'); ?>
        Bienvenue sur mon portfolio&nbsp;! Mon nom est Neil Kreuer, étudiant designer web à la Haute École de la Province de Liège.
    </p>
    <article class="home__bio">
        <h2 class="home__bio__title"><?= get_field('bio_title') ?></h2>
        <p class="home__bio__text"><?= get_field('bio_content') ?></p>
    </article>
</div>

<section class="tools" id="tools">
    <h2>
        <label for="my-tools"
               class="tools__button" title="Afficher mes outils" tabindex="0">
            Mes outils
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
    <h2 class="projects__title">Mes projets</h2>

    <div class="projects__container projects__container--suggest">
        <?php if ($recent_projects->have_posts()): while ($recent_projects->have_posts()): $recent_projects->the_post(); ?>
            <a class="projects__item" href="<?= get_page_link() ?>">
                <article class="projects__item__article">
                    <?php $image = get_field('project_thumbnail'); ?>
                    <h3 class="projects__item__title"><?= get_the_title(); ?></h3>
                    <div class="projects__item__effect"></div>
                    <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '370', 'height' => '209', 'class' => 'projects__item__img']); ?>
                </article>
            </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="/projects" class="inavlink inavlink--right">
        <span class="inavlink__text">Voir <span
                    class="inavlink__text--underlined">tous mes projets</span></span>
    </a>
</section>

<div id="contact">
    <section class="links" id="my-links">
        <h2 class="links__title">Mes liens</h2>
        <div class="links__div">
            <p class="links__text">Si vous souhaitez en voir plus, voici les liens vers mes pages&nbsp;:</p>
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
            <p>Vous souhaitez me contacter&nbsp;? Vous pouvez passer par mon formulaire de contact à côté, ou m’envoyer un mail directement via l’adresse e-mail suivante&nbsp;:</p>
            <p class="links__data">neil.kreuer@student.hepl.be</p>
        </div>
    </section>

    <section class="contact">
        <h2 class="contact__title">Me contacter directement</h2>

    </section>
</div>

<?php get_footer(); ?>
