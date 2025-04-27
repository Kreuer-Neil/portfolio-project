<?php

$recent_projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<?php get_header(); ?>

    <section class="about" id="about">
        <h2 class="home-title">
            <svg class="home-title__logo" title="Neil Kreuer"
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
        </h2>
        <?php // TODO import SVG with it's frame (composed SVG tier 2) ?>
        <p class="about__content">
            <?php /* <?= get_field('short_bio_content'); */ ?>
            Bienvenue sur mon portfolio&nbsp;! Bien qu’il soit fait en Wordpress (principalement pour des raisons de
            contraintes scolaires), ce site est bien mon portfolio officiel&nbsp;! Mon nom est Neil Kreuer, Dev Web bientôt
            en fin d’apprentissage à la Haute École de la Province de Liège.
        </p>
        <label for="about-me"
               class="about__button" title="Afficher ma bio">
            Plus à propos de moi
        </label>
        <div class="about__container">
            <input type="checkbox"
                   id="about-me" class="hidden-checkbox"> <?php // TODO Mettre en place le truc de faire apparaître la bio du portfolio ?>
            <article class="about__item">
                <h3 class="about__title">Plutôt “dev” que “designer” web</h3>
                <p class="about__content">Je suis un web dev, plutôt intéressé par l’UX et le
                    back-end
                    (php), assez fan de l’utilisation de Laravel, et surtout LiveWire en ce qui concerne la création de
                    web-app. Je prends pas mal de plaisir à travailler en équipe sur les projets et échanger sur la
                    meilleure méthode à appliquer, et trouve cet aspect relativement important.
                    Honnêtement, le design, ce n’est pas vraiment mon point fort lorsqu’il s’agit de les créer de 0,
                    mais je me débrouille en CSS. J’ai un faible pour TailwindCSS, qui est rapide et efficace pour rapidement
                    mettre</p>
            </article>
            <article class="about__item">
                <?php /* <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p> */ ?>
                <h3 class="about__title">Que dire de plus à propos de moi ?</h3>
                <p>Je pourrais mentionner ici que j’ai un relativement bon niveau de français, et que je parle également
                    relativement bien l’allemand et l’anglais, et que j’ai également un CESS (Certificat d’Études
                    Secondaires Supérieures) avec spécialisation en techniques d’infographie.
                    Il n’y a pas grand chose à dire de plus d’intéressant. J’aime beaucoup les jeux vidéos, surtout ceux
                    qui
                    sont moins populaires, mais pas moins intéressants et incroyables pour autant. J’essaie de dessiner
                    un
                    peu dans mon temps libre, principalement en pixelart, avec lequel je m'amuse parfois à faire des
                    sprites
                    pour le fun. Mais j’aime surtout me défouler sur l’écriture, et ce même si je me cherche encore un
                    style
                    de narration me convenant.</p>
            </article>
            <article class="about__item">
                <?php /* <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p> */ ?>
                <h3 class="about__title">L’accessibilité, pas qu'une formalité</h3>
                <p>Je valorise fortement l’accessibilité. Les contrastes, le principe d’affordance, mais aussi les
                    attributs Aria, tableaux avec scopes, attributs alt et title, éléments en Screen Reader Only, … font
                    partie de mon vocabulaire courant.
                    Le web est une ressource créée dans le but d’offrir un accès total à une mine d'informations et de
                    fonctionnalités à tous et à toutes, et cela n'exclut personne. Aussi bien personnes naviguant au
                    clavier souris, que les personnes malvoyantes en lecteur d’écrans, celles naviguant au clavier
                    uniquement, ou même accédant au web par un appareil mobile.</p>
            </article>
        </div>
        <a href="<?= get_posts_nav_link('projects')?>" class="about__inavlink inavlink inavlink--right"><div class="inavlink__bg"></div><span class="inavlink__text">Voir <span
                        class="inavlink__text--underlined">tous mes projets</span></span></a>
    </section>

    <section class="projects" id="projects">
        <h2 class="projects__title">Mes projets</h2>

        <div class="projects__container projects__container--suggest">
            <?php if ($recent_projects->have_posts()): while ($recent_projects->have_posts()): $recent_projects->the_post(); ?>
                <article class="projects__item">
                    <?php $image = get_field('project_thumbnail'); ?>
                    <h3 class="projects__item__title"><?= get_the_title(); ?></h3>
                    <a class="projects__item__link" href="<?= get_page_link() ?>">Voir le projet</a>
                    <?= get_the_post_thumbnail(size: 'thumbnail', attr: ['width' => '370', 'height' => '209', 'class' => 'projects__item__img']); ?>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="my-links">
        <h2 class="my-links__title">Mes liens</h2>
        <ul class="my-links__container">
            <li class="my-links__li">
                <a href="https://github.com/Kreuer-Neil" class="my-links__link my-links__link--github">Mon GitHub</a>
            </li>
        </ul>
    </section>
<?php get_footer(); ?>

