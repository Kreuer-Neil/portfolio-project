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
    <main class="page" id="content">
        <div class="page__content">

            <section class="about" id="about">
                <h2 class="about__title">Qui suis-je ?<span class="sro"> Petite biographie</span></h2>

                <article class="about__container--short">
                    <?php if(get_field('short_bio_title')): ?>
                    <h3 class="about__title--short"><?= get_field('short_bio_title')?></h3>
                    <?php endif; ?>

                    <p class="about__content--short">
                        <?= get_field('short_bio_content'); ?>
                    </p>
                </article>
                <div class="about__quick-nav">
                    <?php //todo mettre les title et liens en wp ?>
                    <a href="#projects">Vers les projets</a>
                    <a href="#contact" class="about__quick__contact no-js" title="Vers la page de contact">Me contacter</a>
                    <?php
                    //todo mettre le lien façon WP (ou pas)
                    //todo faire apparaître avec une checkbox ? Le label serait le texte d'ouverture et la croix la checkbox (input type checkbox)
                    //todo si en checkbox mettre lien d'évitement vers le formulaire, et lien de retour après (faisable ?)
                    //todo ou mettre directement dessous et toggle la visibility pour éviter problèmes d'accessibilité (voir comment boucler la nav dedans temporairement dans ce cas)
                    ?>
                </div>
                <article class="about__container--skills">
                    <h2 class="about__title--skills"><?= get_field('skills_title') ?></h2>
                    <p class="about__content--skills"><?= get_field('skills_content')?></p>
                </article>
                <article class="about__container--specs">
                    <h2 class="about__title--specs"><?= get_field('specialities_title') ?></h2>
                    <p class="about__content--specs"><?= get_field('specialities_content')?></p>
                </article>
            </section>

            <section class="projects" id="projects">
                <h2 class="projects__title">Mes projets</h2>

                <div class="projects__container">
                    <?php if($recent_projects->have_posts()): while($recent_projects->have_posts()): $recent_projects->the_post(); ?>
                        <article class="project">
                            <?php $image = get_field('project_thumbnail'); ?>
                            <sh></sh>
                            <h3 class="project__title"><?= get_the_title(); ?></h3>
                            <p><?= get_field('short_description') ?></p>
                            <p class="project__link"><a href="<?= get_page_link() ?>">Vers le projet</a></p>
                            <img class="project__img" src="<?= $image['sizes']['thumbnail'] ?>" alt="<?= $image['alt'] ?>">
                        </article>
                    <?php endwhile; endif; ?>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>