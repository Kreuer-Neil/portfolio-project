<?php

$recent_projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
]);

?>

<?php get_header(); ?>
    <main class="page" id="content">
        <div class="page__content">

            <section class="about" id="about">
                <h2 class="about__title">Qui suis-je ?<span class="sro"> Petite biographie</span></h2>

                <article class="about__short">
                    <?php if(get_field('short_bio_title')): ?>
                    <h3 class="about__short__title"><?= get_field('short_bio_title')?></h3>
                    <?php endif; ?>

                    <p class="about__short__content">
                        <?= get_field('short_bio_content'); ?>
                    </p>
                </article>
                <div class="about__quick-nav">
                    <a href="#<?= get_field('projects_title')?>"
                    <a href="#<?= get_field('form_title')?>" class="about__quick__contact no-js" title="Vers la page de contact">Me contacter</a>
                    <?php
                    //todo mettre le lien façon WP (ou pas)
                    //todo faire apparaître avec une checkbox ? Le label serait le texte d'ouverture et la croix la checkbox (input type checkbox)
                    //todo si en checkbox mettre lien d'évitement vers le formulaire, et lien de retour après (faisable ?)
                    //todo ou mettre directement dessous et toggle la visibility pour éviter problèmes d'accessibilité (voir comment boucler la nav dedans temporairement dans ce cas)
                    ?>
                </div>
                <article class="about__skills">
                    <h2 class="about__skills__title"><?= get_field('skills_title') ?></h2>
                </article>
            </section>

            <section class="projects" id="projects">
                <h2 class="projects__title"
                <div class="projects__container">
                    <?php foreach ($recent_projects as $project) : ?>
                        <article class="project__item">

                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>