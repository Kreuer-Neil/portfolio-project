<?php
register_post_type('project', [
    'label' => 'Projects',
    'description' => 'Mes projets affichés sur le site',
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 21,
    'menu_icon' => 'dashicons-cover-image',
    'has_archive' => false,
    'rewrite' => [
        'slug' => 'projects',
    ],
    'supports' => ['title', 'excerpt', 'editor', 'thumbnail'],
]);

// Ajout des taxonomies
register_taxonomy('project_type', ['project'], [
    'labels' => [
        'name' => 'Project types',
        'singular' => 'Project type'
    ],
    'description' => 'Project types',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'project-types'],
],
);
