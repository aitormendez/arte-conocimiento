<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [
        'proyecto' => [
            'enter_title_here' => 'Título del proyecto',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 2,
        ],
        'noticia' => [
            'enter_title_here' => 'Título de la noticia',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 3,
        ],
        'actividad' => [
            'enter_title_here' => 'Título de la noticia',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 4,
            'labels' => [
                'singular' => 'Actividad',
                'plural' => 'Actividades',
            ],
        ],
        'publicacion' => [
            'enter_title_here' => 'Título de la publicación',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 5,
            'labels' => [
                'singular' => 'Publicación',
                'plural' => 'Publicaciones',
            ],
        ],
        'referencia' => [
            'enter_title_here' => 'Título de la referencia',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 6,
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomy' => [
        'metaproyecto' => [
            'links' => [
                'proyecto',
                'noticia',
                'actividad',
                'publicacion',
            ],
            'meta_box' => 'simple',
        ],
        'lineas_investigacion' => [
            'links' => [
                'proyecto',
                'noticia',
                'actividad',
                'publicacion',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'singular' => 'Línea de investigación',
                'plural' => 'Líneas de investigación',
            ],
        ],
        'tipo_de_referencia' => [
            'links' => [
                'referencia',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'singular' => 'Tipo de referencia',
                'plural' => 'Tipos de referencias',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Blocks
    |--------------------------------------------------------------------------
    |
    | Here you may specify the block types to be registered by Poet and
    | rendered using Blade.
    |
    | Blocks are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the block `sage/accordion`, your block view would be located at:
    |   ↪ `views/blocks/accordion.blade.php`
    |
    | Block views have the following variables available:
    |   ↪ $data    – An object containing the block data.
    |   ↪ $content – A string containing the InnerBlocks content.
    |                Returns `null` when empty.
    |
    */

    'block' => [
        // 'sage/accordion',
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block categories to be registered by Poet for use
    | in the editor.
    |
    */

    'block_categories' => [
        // 'cta' => [
        //     'title' => 'Call to Action',
        //     'icon' => 'star-filled',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor Palette
    |--------------------------------------------------------------------------
    |
    | Here you may specify the color palette registered in the Gutenberg
    | editor.
    |
    | A color palette can be passed as an array or by passing the filename of
    | a JSON file containing the palette.
    |
    | If a color is passed a value directly, the slug will automatically be
    | converted to Title Case and used as the color name.
    |
    | If the palette is explicitly set to `true` – Poet will attempt to
    | register the palette using the default `palette.json` filename generated
    | by <https://github.com/roots/palette-webpack-plugin>
    |
    */

    'palette' => [
        // 'red' => '#ff0000',
        // 'blue' => '#0000ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Menu
    |--------------------------------------------------------------------------
    |
    | Here you may specify admin menu item page slugs you would like moved to
    | the Tools menu in an attempt to clean up unwanted core/plugin bloat.
    |
    | Alternatively, you may also explicitly pass `false` to any menu item to
    | remove it entirely.
    |
    */

    'admin_menu' => [
        // 'gutenberg',
    ],

];