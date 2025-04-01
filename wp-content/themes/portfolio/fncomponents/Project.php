<?php

namespace FnComponents;

class Project
{
    public static function getInstance() :void
    {
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
    }
}