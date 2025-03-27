<?php get_header() ?>

<section>
    <h1>Résultats de recherche pour <?= get_search_query() ?></h1>
    <?php if (have_posts()): ?>
    <ul>
        <?php while (have_posts()): the_post(); ?>
        <li>
            <a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php else: ?>
    <p>Pas de résultats. Veuillez revérifier l'orthographe de ce que vous avez écrit.</p>
    <?php endif; ?>
</section>

<?php get_footer() ?>
