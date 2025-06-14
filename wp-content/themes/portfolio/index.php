<?php get_header(); ?>
<h1 class="sro"><?= get_the_title() ?></h1>
<?= get_the_id() ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

    <h2><?= get_the_title(); ?></h2>

    <div><?= get_the_content(); ?></div>

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p class="empty">La page est vide.</p>
<?php endif; ?>
<?php get_footer(); ?>

