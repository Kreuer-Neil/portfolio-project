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

<nav class="main-nav" id="main-nav">
    <h2 class="sro">Menu de navigation principale</h2>
    <ul class="main-nav__container">
        <li class="main-nav__item main-nav__item--home">
            <a class="main-nav__link main-nav__link--home" href="<?= get_home_url() ?>" title="Vers l'accueil">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 127" class="main-nav__logo">
                    <path fill="url(#a)" d="M168 0h-63.5v62.5L168 0ZM104.5 88.707V127H168l-53-46.5-10.5 8.207Z"/>
                    <path fill="url(#b)" d="M127.5 67.5 180 114V13l-52.5 54.5Z"/>
                    <path fill="url(#c)" d="M85.5 95V0H21l64.5 95ZM19 30v97h65L19 30Z"/>
                    <defs>
                        <linearGradient id="a" x1="104.5" x2="168" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FC76FA"/>
                            <stop offset="1" stop-color="#A516FA"/>
                        </linearGradient>
                        <linearGradient id="b" x1="127.5" x2="180" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FC76FA"/>
                            <stop offset="1" stop-color="#A516FA"/>
                        </linearGradient>
                        <linearGradient id="c" x1="85.5" x2="21" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FEC552"/>
                            <stop offset="1" stop-color="#FF6A1A"/>
                        </linearGradient>
                    </defs>
                </svg>
            </a>
        </li>
        <?php if ($footNavLinks = portfolio_get_navigation_links('footer'))
            foreach ($footNavLinks as $link): ?>
                <li class="main-nav__item<?php if ($link->url === get_page_link()) echo ' main-nav__item--active' ?>">
                    <a class="main-nav__link" href="<?= $link->url ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
    </ul>
</nav>
<main id="main" <?= ($schema = get_field('page_schema')) ? " itemscope itemtype=\"{$schema}\"" : '' ?>>
