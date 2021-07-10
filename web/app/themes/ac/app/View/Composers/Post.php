<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
            'personas' => $this->personas(),
            'personas_front_page' => function($post_id) {
                
                // crear array de USUARIOS que están en el post

                $personas_post = [];
                if( have_rows('usuarios', $post_id) ):
                    while( have_rows('usuarios', $post_id) ) : the_row();
                        $usuario_post = get_sub_field('nombre_usuario');
                        $nombre_post = $usuario_post['display_name'];
                        $rol_post = get_sub_field('rol_usuario');
                        array_push($personas_post, [
                            'tipo' => 'usuario',
                            'user' => $usuario_post,
                            'nombre' => $nombre_post,
                            'rol' => $rol_post,
                            'permalink' => get_author_posts_url($usuario_post['ID']),
                        ]);
                    endwhile;
                endif;

                // crear array de PARTICIPANTES que están en el post

                if( have_rows('participantes', $post_id) ):
                    while( have_rows('participantes', $post_id) ) : the_row();
                        $nombre_post = get_sub_field('nombre_participante');
                        $rol_post = get_sub_field('rol_participante');
                        array_push($personas_post, [
                            'tipo' => 'participante',
                            'nombre' => $nombre_post,
                            'rol' => $rol_post,
                            ]);
                    endwhile;
                endif;



                return $personas_post;
            }
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            /* translators: %s is replaced with the search query */
            return sprintf(
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    public function personas()
    {
        global $post;

        // SINGLE
        // ------------------------------------------------------------------

        if (is_single()) {
            // crear array de USUARIOS que están en el post

            $personas_post = [];
            if( have_rows('usuarios') ):
                while( have_rows('usuarios') ) : the_row();
                    $usuario_post = get_sub_field('nombre_usuario');
                    $nombre_post = $usuario_post['display_name'];
                    $rol_post = get_sub_field('rol_usuario');
                    array_push($personas_post, [
                        'tipo' => 'usuario',
                        'user' => $usuario_post,
                        'nombre' => $nombre_post,
                        'rol' => $rol_post,
                        'permalink' => get_author_posts_url($usuario_post['ID']),
                        ]);
                endwhile;
            endif;

            // crear array de PARTICIPANTES que están en el post

            if( have_rows('participantes') ):
                while( have_rows('participantes') ) : the_row();
                    $nombre_post = get_sub_field('nombre_participante');
                    $rol_post = get_sub_field('rol_participante');
                    array_push($personas_post, [
                        'tipo' => 'participante',
                        'nombre' => $nombre_post,
                        'rol' => $rol_post,
                        ]);
                endwhile;
            endif;

            return $personas_post;
        }

        // LOOP FRONT PAGE
        // ------------------------------------------------------------------
        
        // mirar en 'public function override()' en este mismo archivo.



        

        
    }
}
