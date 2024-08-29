<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <h1><?= get_the_title(); ?></h1>
                <?= get_the_content() ?>

                <section class="bio">
                    <h2 class="bio__title">Qui suis-je ?<span class="sro"> Petite biographie</span></h2>

                    <article class="bio__quick">
                        <h3 class="bio__quick__title"><span class="sro">Courte biographie</span></h3>

                        <p class="bio__quick__content">
                            <?= $bio->short->get_the_content(); ?>
                        </p>
                    </article>

                        <a href="#" class="bio__quick__contact no-js" title="Vers la page de contact"></a>
                        <?php //todo mettre le lien façon WP
                        //todo faire apparaître avec une checkbox ? Le label serait le texte d'ouverture et la croix la checkbox (input type checkbox)
                        //todo si en checkbox mettre lien d'évitement vers le formulaire, et lien de retour après (faisable ?)
                        //todo ou mettre directement dessous et toggle la visibility pour éviter problèmes d'accessibilité (voir comment boucler la nav dedans temporairement dans ce cas)
                        ?>
                </section>


            <?php endwhile; endif; ?>
        </div>
    </main>
<?php get_footer(); ?>