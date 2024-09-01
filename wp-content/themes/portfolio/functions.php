<?php

// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');
add_theme_support( 'custom-header' );
add_theme_support( 'custom-footer');

// Enregistrer des menus de navigation :
register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');

register_post_type('project', [
    'label' => 'Projects',
    'description' => 'Mes projets affichés sur le site',
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 21,
    'menu_icon' => 'dashicons-cover-image',
    'has_archive' => true,
    'rewrite' => [
        'slug' => 'projects',
    ]
]);
/*
// Enregistrer un "type de contenu" personnalisé (recette)
register_post_type('recipe', [
    'label' => 'Recettes',
    'description' => 'Recettes affichées sur le site web',
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 21,
    'menu_icon' => 'dashicons-carrot',
    'has_archive' => true,
    'rewrite' => [
        'slug' => 'recettes',
    ]
]);

register_post_type('trips', [
    'label' => 'Voyages',
    'description' => 'Voyages affichés sur le site web',
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 22,
    'menu_icon' => 'dashicons-airplane',
    'has_archive' => true,
    'rewrite' => [
        'slug' => 'recits-voyage',
    ]
]);

// Enregistrer une taxonomie personnalisée :

register_taxonomy('countries', ['trips','recipe'], [
    'labels' => [
        'name' => 'Pays',
        'singular_name' => 'Pays',
    ],
    'description' => 'Les pays pour lesquels on a créé du contenu.',
    'public' => true,
    'hierarchical' => true,
    'rewrite' => [
        'slug' => 'pays'
    ],
]);
*/

// Fonctions propres au thème :

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end.
function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

// 2. Retrouver les éléments d'un menu pour une location donnée
function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if(is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}
