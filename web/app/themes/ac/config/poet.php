<?php

$transferencia_desc = get_field('cpt_transferencia_description', 'option');
$investigacion_desc = get_field('cpt_investigacion_description', 'option');
$publicacion_desc = get_field('cpt_publicacion_description', 'option');
$actividad_desc = get_field('cpt_actividad_description', 'option');

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
        // 'proyecto' => [
        //     'enter_title_here' => 'Título del proyecto',
        //     // 'menu_icon' => 'dashicons-book-alt',
        //     'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
        //     'show_in_rest' => true,
        //     'has_archive' => true,
        //     'taxonomies' => ['post_tag'],
        //     'menu_position' => 2,
        //     'admin_cols'   => [
        //         'destacado' => [
        //             'title'    => 'Destacado',
        //             'meta_key' => 'destacar',
        //         ],
        //         'formato' =>[
        //             'title'    => 'Formato del destacado',
        //             'meta_key' => 'destacar_imagen_texto',
        //         ],
        //         'tipo' =>[
        //             'title'    => 'Tipo',
        //             'taxonomy' => 'tipo_de_proyecto',
        //         ],
        //     ],
        // ],
        'noticia' => [
            'enter_title_here' => 'Título de la noticia',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 3,
            'admin_cols'   => [
                'destacado' => [
                    'title'    => 'Destacado',
                    'meta_key' => 'destacar',
                ],
                'formato' =>[
                    'title'    => 'Formato del destacado',
                    'meta_key' => 'destacar_imagen_texto',
                ],
            ],
        ],
        'actividad' => [
            'enter_title_here' => 'Título de la noticia',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 4,
            'description' => $actividad_desc,
            'labels' => [
                'singular' => 'Actividad',
                'plural' => 'Actividades',
            ],
            'admin_cols'   => [
                'destacado' => [
                    'title'    => 'Destacado',
                    'meta_key' => 'destacar',
                ],
                'formato' =>[
                'title'    => 'Formato del destacado',
                'meta_key' => 'destacar_imagen_texto',
                ],
            ],
        ],
        'Transferencia' => [
            'enter_title_here' => 'Título de la entrada',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'description' => $transferencia_desc,
            'has_archive' => true,
            'taxonomies' => ['post_tag'],
            'menu_position' => 4,
            'labels' => [
                'singular' => 'Transferencia',
                'plural' => 'Transferencias',
            ],
            'admin_cols'   => [
                'destacado' => [
                    'title'    => 'Destacado',
                    'meta_key' => 'destacar',
                ],
                'formato' =>[
                'title'    => 'Formato del destacado',
                'meta_key' => 'destacar_imagen_texto',
                ],
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
            'description' => $publicacion_desc,
            'labels' => [
                'singular' => 'Publicación',
                'plural' => 'Publicaciones',
            ],
            'admin_cols'   => [
                'destacado' => [
                    'title'    => 'Destacado',
                    'meta_key' => 'destacar',
                ],
                'formato' =>[
                'title'    => 'Formato del destacado',
                'meta_key' => 'destacar_imagen_texto',
                ],
            ],
        ],
        'investigacion' => [
            'enter_title_here' => 'Título de la entrada',
            // 'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'has_archive' => true,
            'description' => $investigacion_desc,
            'taxonomies' => ['post_tag'],
            'menu_position' => 6,
            'labels' => [
                'singular' => 'Investigación',
                'plural' => 'Investigaciones',
            ],
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
        'proyecto' => [
            'links' => [
                // 'proyecto',
                'noticia',
                'actividad',
                'publicacion',
                'investigacion',
                'transferencia',
            ],
            'meta_box' => 'simple',
        ],
        'lineas_investigacion' => [ // ojo, está en plural. Cambiar antes de meter contenido real
            'links' => [
                // 'proyecto',
                'noticia',
                'actividad',
                'publicacion',
                'investigacion',
                'transferencia',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'slug' => 'linea-investigacion',
                'singular' => 'Línea de investigación',
                'plural' => 'Líneas de investigación',
            ],
        ],
        'tipo_de_investigacion' => [
            'links' => [
                'investigacion',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'slug' => 'tipo-de-investigacion',
                'singular' => 'Tipo de investigación',
                'plural' => 'Tipos de investigación',
            ],
        ],
        'tipo_de_actividad' => [
            'links' => [
                'actividad',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'slug' => 'tipo-de-actividad',
                'singular' => 'Tipo de actividad',
                'plural' => 'Tipos de actividad',
            ],
        ],
        'tipo_de_transferencia' => [
            'links' => [
                'transferencia',
            ],
            'meta_box' => 'simple',
            'labels' => [
                'slug' => 'tipo-de-transferencia',
                'singular' => 'Tipo de transferencia',
                'plural' => 'Tipos de transferencia',
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

    'block_category' => [
        // 'cta' => [
        //     'title' => 'Call to Action',
        //     'icon' => 'star-filled',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Patterns
    |--------------------------------------------------------------------------
    |
    | Here you may specify block patterns to be registered by Poet for use
    | in the editor.
    |
    | Patterns are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the pattern `sage/hero`, your pattern content would be located at:
    |   ↪ `views/block-patterns/hero.blade.php`
    |
    | See: https://developer.wordpress.org/reference/functions/register_block_pattern/
    */

    'block_pattern' => [
        // 'sage/hero' => [
        //     'title' => 'Page Hero',
        //     'description' => 'Draw attention to the main focus of the page, and highlight key CTAs',
        //     'categories' => ['all'],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Pattern Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block pattern categories to be registered by Poet for
    | use in the editor.
    |
    */

    'block_pattern_category' => [
        'all' => [
            'label' => 'All Patterns',
        ],
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
