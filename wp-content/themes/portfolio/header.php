<!DOCTYPE html>
<html lang="<?= pll__('en') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="author" content="Kreuer Neil"/>
        <meta name="keyword" content="Portfolio, Neil Kreuer, Web Designer, CV, Web Developer">
    <title><?= pll__(get_bloginfo('name')) ?></title>

    <?php wp_head() ?>
</head>
<body class="custom-page dark">

<?php /*
<header>
    <nav class="main-nav" id="main-nav">
        <h2 class="sro">Menu de navigation principale</h2>
        <ul>
            <li class="nav-home">
                <?php // <a class="main-nav__link--home" href="--><?php //= get_home_url() ?><!--" title="Vers l'accueil"> ?>
                    <svg class="site-icon" title="Logo Neil Kreuer - Web dev" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 181 129" role="img" width="50">
                        <defs></defs>
                        <path class="site-icon--1" d="M167.58 1.45h-62.75v61.93l62.75-61.93z"/>
                        <path class="site-icon--2" d="m128.12 68.07 52.2 46.24V14.19l-52.2 53.88z"/>
                        <path class="site-icon--1" d="M104.83 89.45v38.19h62.75l-52.2-46.24-10.55 8.05z"/>
                        <path class="site-icon--2" d="M85.74 95.07V1.45H22.25l63.49 93.62z"/>
                        <path class="site-icon--1" d="M19.69 31.69v95.95h65.07L19.69 31.69z"/>
                        <path class="site-icon__stroke" d="M1 1h179v127H1z"/>
                    </svg>
                <?php // </a> ?>
            </li>
            <?php foreach (dw_get_navigation_links('main') as $link): ?>
                <li <?php if ($link->url === get_page_link()) echo 'class="nav-active"' ?>>
                    <a href="<?= $link->url ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
    */ ?>
<main id="main" <?= ($schema = get_field('page_schema'))?" itemscope itemtype=\"{$schema}\"":'' ?>>
