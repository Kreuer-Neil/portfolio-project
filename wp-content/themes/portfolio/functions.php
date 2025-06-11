<?php

// Load ACF fields
require_once('fields.php');

// Deactivate Gutenberg
add_filter('use_block_editor_for_post', '__return_false');
add_theme_support('custom-header');
add_theme_support('custom-footer');
add_theme_support('post-thumbnails');

// Remove WP toolbar
add_filter('show_admin_bar', '__return_false');


// Register nav menus
register_nav_menu('lang', 'Languages');
register_nav_menu('footer', 'Footer nav');


// Remove base widht/height for thumbnail img
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);

function remove_thumbnail_dimensions($html, $post_id, $post_image_id)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


//retirer des fonctions de base WP
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

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
        wp_enqueue_script('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']), [], null, true);
    }

    if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss'])) {
        wp_enqueue_style('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']));
    }
}

//register project post type + taxonomy
require_once('projects.php');

// Translations
require_once('translations.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function portfolio_get_navigation_links(string $location): array
{
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    if (is_null($menuId)) {
        return [];
    }

    $items = wp_get_nav_menu_items($menuId);

    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    return $items;
}

function portfolio_get_translation_string(string $page, string $postslug = ''): string
{
    if ($lang = ('/' . pll__('en')) === '/en')
        $lang = '';
    return get_home_url() . $lang . '/' . pll__($page) . '/' . $postslug;
}

// Contact

// Ajouter un post-type custom pour sauvegarder les messages de contact
register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title', 'editor'],
]);

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_portfolio_submit_contact_form', 'portfolio_handle_contact_form');
add_action('admin_post_nopriv_portfolio_submit_contact_form', 'portfolio_handle_contact_form');

// Get form handling class
require_once(__DIR__ . '/forms/ContactForm.php');

function portfolio_execute_contact_form()
{
    $config = [
        'nonce_field' => 'contact_nonce',
        'nonce_identifier' => 'portfolio_contact_form',
    ];
    (new forms\ContactForm($config, $_POST))
        ->sanitize([
            'name' => 'text_field',
            'email' => 'email',
            'message' => 'textarea_field',
        ])
        ->validate([
            'name' => ['required', 'short'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ])->save(
            title: fn($data) => $data['name'] . ' <' . $data['email'] . '>',
            content: fn($data) => $data['message'],
        )
        ->send(
            title: fn($data) => 'New message from ' . $data['name'],
            content: fn($data
            ) => 'Name: ' . $data['name'] . PHP_EOL . 'Email: ' . $data['email'] . PHP_EOL . 'Message:' . PHP_EOL . $data['message'],
        )->feedback();
}

add_action('admin_post_nopriv_portfolio_contact_form', 'portfolio_execute_contact_form');
add_action('admin_post_portfolio_contact_form', 'portfolio_execute_contact_form');

function portfolio_session_flash(string $key, mixed $value): void
{
    if (!isset($_SESSION['portfolio_flash'])) {
        $_SESSION['portfolio_flash'] = [];
    }

    $_SESSION['portfolio_flash'][$key] = $value;
}

function portfolio_session_get(string $key)
{
    if (!(isset($_SESSION['portfolio_flash']) && array_key_exists($key, $_SESSION['portfolio_flash']))) {
        return null;
    }

    $value = $_SESSION['portfolio_flash'][$key];
    unset($_SESSION['portfolio_flash'][$key]);

    return $value;

}


