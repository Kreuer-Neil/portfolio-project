<?php

get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post() ?>

    <h1><?= get_field('project_title') ?></h1>
    <div class="project__container project__container--first">
        <?= get_the_post_thumbnail(size: 'large', attr: ['width' => '692px', 'height' => '390px', 'class' => 'project__img']); ?>

        <div class="project__subcontainer">
        <p class="project__text project__text--first"><?= get_field('description') ?></p>

        <?php if (have_rows('links')): ?>
            <ul class="links__container">
                <?php while (have_rows('links')): the_row();
                    $field_type = get_sub_field('links') ?>
                    <li class="links__li">
                        <a title="<?= get_sub_field('a_title') ?>" href="<?= get_sub_field('url') ?>"
                           class="links__link icon icon__<?= $field_type['value'] ?>">Page <?= $field_type['label'] ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        </div>
    </div>

    <?php if (have_rows('content')): while (have_rows('content')): the_row() ?>
        <article class="project__container">
            <img src="<?= get_sub_field('sub_image')['sizes']['medium'] ?>"
                 alt="<?= get_sub_field('sub_image')['alt'] ?>" width="692px" height="390px" class="project__img">
            <div class="project__subcontainer">
                <h2 class="project__sub-title"><?= get_sub_field('sub_title') ?></h2>
                <p class="project__text"><?= get_sub_field('sub_text') ?></p>
            </div>
        </article>
    <?php endwhile; endif;
endwhile;
else: ?>
    <div class="error">
        <h1 class="error__title">Ce projet ne semble pas exister.</h1>
        <p class="error__text">Veuillez tenter un autre projet, ou cessez de jouer avec l'URL&nbsp;!</p>
    </div>
<?php endif; ?>
<?php get_footer(); ?>