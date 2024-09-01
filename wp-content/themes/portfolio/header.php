<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="author" content="Kreuer Neil"/>
    <?php wp_head() ?>
    <meta name="keyword" content="Portfolio, Neil Kreuer, Web Designer, CV, Web Developer">
    <meta name="description" content="Nouvelle page d'accueil du Service d'Entraide Familiale, version de Neil Kreuer"/>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= dw_asset('css/site.css'); ?>">
</head>
<body>

<header>
    <h1 ><span class="sro"><?= get_the_title(); ?></span><a href="<?= get_home_url() ?>" title="Vers l'accueil"><svg></svg></a></h1>
    <?php //todo mettre le SVG dans le titre ?>

    <nav class="main-nav" id="main-nav">
        <h2 class="main-nav__title sro">Menu de navigation principale</h2>
            <ul class="main-nav__container">
                <?php foreach (dw_get_navigation_links('main') as $link): ?>
                    <li class="main-nav__element<?php if ($link->url === get_page_link()) echo " main-nav__elements--active" ?>">
                        <a href="<?= $link->url ?>" class="main-nav__links"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
    </nav>
</header>