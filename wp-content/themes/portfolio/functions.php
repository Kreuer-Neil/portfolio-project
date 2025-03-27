<?php

//Charger les champs ACF exportés

include_once('fields.php');

// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');
add_theme_support('custom-header');
add_theme_support('custom-footer');

// Enregistrer des menus de navigation :
register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');

//retirer des fonctions de base WP
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

//importer le CSS et JS
$manifestPath = get_theme_file_path('public/.vite/manifest.json');

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js'])) {
        wp_enqueue_script('dw', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']), [], null, true);
    }

    if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss'])) {
        wp_enqueue_style('dw', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']));
    }
}

//register project post type
//Project::getInstance();
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
    if (is_null($menuId)) {
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
