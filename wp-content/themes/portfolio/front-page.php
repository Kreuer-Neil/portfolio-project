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
        <h2 class="about__title">Qui suis-je ?<span class="sro"> Petite biographie</span></h2>

        <article class="about__container--short">
            <?php /* if(get_field('short_bio_title')): ?>
                        <h3 class="about__title--short"><?= get_field('short_bio_title')?></h3>
                    <?php endif; */ ?>

            <p class="about__content--short">
                <?php /* <?= get_field('short_bio_content'); */ ?>
                Bienvenue sur mon portfolio ! Bien qu’il soit fait en Wordpress (malgré moi, pour le moment du moins),
                ce site est bien mon portfolio officiel ! Mon nom est Neil Kreuer, Dev Web bientôt en fin
                d’apprentissage à la Haute École de la Province de Liège.
            </p>
            <a href="<?php /* get_page_link() TODO link page de projets */ ?>"
               class="about__inavlink inavlink inavlink--right" title="Vers ma bio">
                Plus <span class="inavlink__underlined">à propos de moi</span>
            </a>
        </article>
        <article class="about__container about__container--dev">
            <h2 class="about__title about__title--dev">Qui suis-je en tant que développeur ?</h2>
            <p class="about__content about__content--dev">Je suis un web dev, plutôt intéressé par l’UX et le back-end
                (php), assez fan de l’utilisation de Laravel, et surtout LiveWire en ce qui concerne la création de
                web-app. Je prends pas mal de plaisir à travailler en équipe sur les projets et échanger sur la
                meilleure méthode à appliquer, et trouve cet aspect relativement important.
                Honnêtement, le design, ce n’est pas vraiment mon point fort lorsqu’il s’agit de les créer de 0, mais je
                me débrouille en CSS. J’ai un faible pour TailwindCSS, qui est rapide et efficace pour rapidement mettre
                en forme un site web, ne lui trouvant comme seul défaut qu’il utilise JS pour fonctionner, son surplus
                de classes facilement compensé par la possibilité d’empiler les règles sous des classes customisées dans
                les fichiers de config, comme du simple CSS amélioré.
                En ce qui concerne l’utilisation de JavaScript (à l’aide de TypeScript afin d’avoir quelque chose de
                bien plus propre), j’apprécie beaucoup m’en servir, entre autres afin de faire des Single Page App, mais
                aussi dans le but de faire des animations et petites fonctionnalités que HTML et CSS ne permettraient
                pas de faire.
                Quelques points importants pour moi lorsque je code sont de me retrouver avec un rendu HTML un minimum
                correct et propre dans la vue finale, que les sites soient entièrement accessible pour un maximum de
                personnes, ce qui inclut qu’un maximum de features soient fonctionnelles sans JS si possible, et de
                pouvoir compter sur l’entraide entre collègues pour avancer et s’améliorer bien plus rapidement.</p>
        </article>
        <article class="about__container about__container--more">
            <?php /* <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p> */ ?>
            <h2 class="about__title about__title--more">Que dire de plus à propos de moi ?</h2>
            <p>Je pourrais mentionner ici que j’ai un relativement bon niveau de français, et que je parle également
                relativement bien l’allemand et l’anglais, et que j’ai également un CESS (Certificat d’Études
                Secondaires Supérieures) avec spécialisation en techniques d’infographie.
                Il n’y a pas grand chose à dire de plus d’intéressant. J’aime beaucoup les jeux vidéos, surtout ceux qui
                sont moins populaires, mais pas moins intéressants et incroyables pour autant. J’essaie de dessiner un
                peu dans mon temps libre, principalement en pixelart, avec lequel je m'amuse parfois à faire des sprites
                pour le fun. Mais j’aime surtout me défouler sur l’écriture, et ce même si je me cherche encore un style
                de narration me convenant.</p>
        </article>
        <a href="" class="about__inavlink inavlink inavlink--right"></a>
    </section>

    <section class="projects" id="projects">
        <h2 class="projects__title">Mes projets</h2>

        <div class="projects__container">
            <?php if ($recent_projects->have_posts()): while ($recent_projects->have_posts()): $recent_projects->the_post(); ?>
                <article class="project">
                    <?php $image = get_field('project_thumbnail'); ?>
                    <sh></sh>
                    <h3 class="project__title"><?= get_the_title(); ?></h3>
                    <p><?= get_field('short_description') ?></p>
                    <p class="project__link"><a href="<?= get_page_link() ?>">Vers le projet</a></p>
                    <?php /* <img class="project__img" src="<?= $image['sizes']['thumbnail'] ?>" alt="<?= $image['alt'] ?>"> */ ?>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="my-links">
        <h2 class="my-links__title">Mes liens</h2>
        <ul class="my-links__container">
            <li class="my-links__li">
                <a href="https://github.com/neil-kreuer" class="my-links__link my-links__link--github">Mon GitHub</a>
            </li>
        </ul>
    </section>
<?php get_footer(); ?>