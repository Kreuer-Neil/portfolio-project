<?php
$links = [
    'github',
    'webpage',
    'simulator',
];
?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post() ?>


<?php // Swtion de liens. TODO faire façon WP. ?>
    <?php if (get_field('link')): ?>
        <article class="links links--project">
            <h2 class="links__title links__title--project">Les liens du projet <?= get_the_title() ?></h2>

            <ul class="links__container links__container--project">
                <?php foreach ($links as $linkTitle): if ($link=get_field($linkTitle)): // TODO chercher via WP le nom des fields ? ?>
                    <li class="links__around links__around--project">
                        <a href="<?= $link ?>>"
                           class="links__link links__link--project links__link--<?= $linkTitle ?>"></a>
                    </li>
                <?php endif; endforeach; ?>
            </ul>
        </article>
    <?php endif; ?>
<?php endwhile; else: ?>
    <p>Ce projet ne semble pas exister.</p>
<?php endif; ?>
<?php get_footer(); ?>