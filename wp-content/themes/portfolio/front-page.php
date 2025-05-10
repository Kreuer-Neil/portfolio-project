<?php

$recent_projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
]);
$tools = new WP_Query([
    'post_type' => 'about_tools',
    'post_status' => 'publish',
//    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<?php get_header(); ?>
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
        <?php /* <?= get_field('short_bio_content'); */ ?>
        Bienvenue sur mon portfolio&nbsp;! Mon nom est Neil Kreuer, étudiant designer web à la Haute École de la Province de Liège.
    </p>
    <article class="home__bio">
        <h2 class="home__bio__title">Mon parcours</h2>
        <p class="home__bio__text">En 2016, j'ai rejoint l'institut St Joseph de Welkenraedt, et y ai passé mes études
            secondaires, jusqu'à l'an de grâce 2020, année Covid 19. La situation me fit réaliser que j'avais envie de
            changement, ce qui me poussa à partir afin d'étudier l'infographie à l'Athénée Royale de Welkenraedt. J'en
            suis sorti avec le <abbr title="Certificat d’Études Secondaires Supérieures">CESS</abbr> et une
            qualification en techniques d'infographie, et ai tout de suite approfondi mes études dans ce domaine à la
            HEPL. C'est là que je découvris ma voie&nbsp;: Web Dev.</p>
    </article>
</div>

<section class="about" id="about">
    <h2>
        <label for="about-me"
               class="about__button" title="Afficher mes outils" tabindex="0">
            Mes outils
        </label>
    </h2>
    <div class="about__container">
        <input type="checkbox"
               id="about-me"
               class="hidden-checkbox"> <?php // TODO Mettre en place le truc de faire apparaître la bio du portfolio ?>
        <?php // if ($tools->have_posts()): while ($tools->have_posts()): $tools->the_post(); ?>
        <article class="about__item">
            <h3 class="about__title">Plutôt “dev” que “designer” web</h3>
            <p class="about__content">Je suis un dev plutôt axé back-end, qui sait assez bien visualiser en avance les
                possibilités avec le code, avec des idées en design manquant d’organisation.</p>
            <img class="about__item__logo" src="<?= '/wp_content/logo.svg' ?>" alt="<?= 'logo de l’outil' ?>"
                 width="128px" height="128px">
        </article>
        <?php // endwhile; endif; ?>
        <article class="about__item">
            <?php /* <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p> */ ?>
            <h3 class="about__title">Figma, avec auto layout et SVG</h3>
            <p>Figma est un outil que j’admire. J’utilise tous les jours son auto layout, et l’application dispose de
                tellement de fonctionnalités que même mes SVG se font par là. Ses composants, variables et différents
                modes permettent de simuler presque entièrement tout le comportement d’une web app.
                <br>Par ailleurs, c’est Figma qui m’aide à préparer mon CSS, grâce à son organisation similaire.</p>
            <img class="about__item__logo" src="<?= '/wp_content/logo.svg' ?>" alt="<?= 'logo de l’outil' ?>"
                 width="128px" height="128px">
        </article>
        <article class="about__item">
            <?php /* <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p> */ ?>
            <h3 class="about__title">Laravel/Livewire</h3>
            <p>Ma meilleure expérience de création de webapp avec du PHP restera via le framework Laravel, voir même
                LiveWire. Le gain de temps titanesque que représente l’utilisation de ces frameworks est incroyable.</p>
            <img class="about__item__logo" src="<?= '/wp_content/logo.svg' ?>" alt="<?= 'logo de l’outil' ?>"
                 width="128px" height="128px">
        </article>
    </div>
    <a href="<?= get_posts_nav_link('projects') ?>" class="inavlink inavlink--right">
        <?php /* <div class="inavlink__bg"></div> */ ?>
        <span class="inavlink__text">Voir <span
                    class="inavlink__text--underlined">tous mes projets</span></span>
    </a>
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
                       class="links__link icon icon__bluesky">Mon profil Bluesky de développeur (professionnel)</a>
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
