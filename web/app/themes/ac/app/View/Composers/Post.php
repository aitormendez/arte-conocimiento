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
            'taxonomias' => $this->taxonomias(),
            'taxonomias_front_page' => function($post_id){ // pasar terms de taxonomías al loop de front page
                $output = [
                    'has_tags' => false,
                    'has_lineas' => false,
                    'has_proyecto' => false,
                    'has_tipo_de_investigacion' => false,
                    'has_tipo_de_actividad' => false,
                    'publicacion' => null,
                    'localizacion' => null,
                ];

                $post_type = get_post_type($post_id);

                $etiquetas = get_the_tags($post_id);

                if ($etiquetas) {
                    $out = array_map( function($term){
                        return [
                            'term' => $term,
                            'link' => get_term_link($term),
                        ];
                    }, $etiquetas);
        
                    $output['has_tags'] = true;
                    $output['tags'] = $out;
                }

                $lineas_investigacion = get_the_terms($post_id, 'lineas_investigacion');

                if ($lineas_investigacion) {
                    $out = array_map( function($term){
                        return [
                            'term' => $term,
                            'link' => get_term_link($term),
                        ];
                    }, $lineas_investigacion);
        
                    $output['has_lineas'] = true;
                    $output['lineas'] = $out;
                }
    
                $proyecto = get_the_terms($post_id, 'proyecto');
    
                if ($proyecto) {
                    $out = array_map( function($term){
                        return [
                            'term' => $term,
                            'link' => get_term_link($term),
                        ];
                    }, $proyecto);
        
                    $output['has_proyecto'] = true;
                    $output['proyecto'] = $out;
                }
    
    
                if ($post_type == 'investigacion') {
                    $tipo_de_proyecto = get_the_terms($post_id, 'tipo_de_investigacion');
    
                    if ($tipo_de_proyecto) {
                        $out = array_map( function($term){
                            return [
                                'term' => $term,
                                'link' => get_term_link($term),
                            ];
                        }, $tipo_de_proyecto);
            
                        $output['has_tipo_de_investigacion'] = true;
                        $output['tipo_de_investigacion'] = $out;
                    }
                }
    
                if ($post_type == 'actividad') {
                    $tipo_de_actividad = get_the_terms($post_id, 'tipo_de_actividad');
    
                    if ($tipo_de_actividad) {
                        $out = array_map( function($term){
                            return [
                                'term' => $term,
                                'link' => get_term_link($term),
                            ];
                        }, $tipo_de_actividad);
            
                        $output['has_tipo_de_actividad'] = true;
                        $output['tipo_de_actividad'] = $out;
                    }
                }
    

                return $output;
            },
            'personas_front_page' => function($post_id) { // pasar personas al loop de front page
                
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

    /**
     * Pasar usuarios y participantes de los post a las plantillas
     *
     * @return array
     */

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

    /**
     * Pasar términos de taxonomías de los post a las plantillas
     *
     * @return array
     */


    public function taxonomias() // recopila también ACF en publicaciones y actividades y si se mustra el extracto
    {
        global $post;
        if (is_single()) {
            $output = [
                'has_tags' => false,
                'has_lineas' => false,
                'has_proyecto' => false,
                'has_tipo_de_investigacion' => false,
                'has_tipo_de_actividad' => false,
                'publicacion' => null,
                'localizacion' => null,
                'extracto' => null,
                'presupuesto' => null,
                'institucion' => null,
            ];

            $etiquetas = get_the_tags($post->post_id);

            if ($etiquetas) {
                $out = array_map( function($term){
                    return [
                        'term' => $term,
                        'link' => get_term_link($term),
                    ];
                }, $etiquetas);
    
                $output['has_tags'] = true;
                $output['tags'] = $out;
            }

            $lineas_investigacion = get_the_terms($post->post_id, 'lineas_investigacion');

            if ($lineas_investigacion) {
                $out = array_map( function($term){
                    return [
                        'term' => $term,
                        'link' => get_term_link($term),
                    ];
                }, $lineas_investigacion);
    
                $output['has_lineas'] = true;
                $output['lineas'] = $out;
            }

            $proyecto = get_the_terms($post->post_id, 'proyecto');

            if ($proyecto) {
                $out = array_map( function($term){
                    return [
                        'term' => $term,
                        'link' => get_term_link($term),
                    ];
                }, $proyecto);
    
                $output['has_proyecto'] = true;
                $output['proyecto'] = $out;
            }

            $extracto = get_field('mostrar_extracto');

            if ($extracto == true) {
                
                $output['extracto'] = wpautop($post->post_excerpt);
            }

            $presupuesto = get_field('presupuesto');

            if ($presupuesto) {
                $output['presupuesto'] = $presupuesto;
            }

            $institucion = get_field('institucion');

            if ($institucion) {
                $output['institucion'] = $institucion;
            }


            if (is_singular('proyecto')) {
                $tipo_de_proyecto = get_the_terms($post->post_id, 'tipo_de_proyecto');

                if ($tipo_de_proyecto) {
                    $out = array_map( function($term){
                        return [
                            'term' => $term,
                            'link' => get_term_link($term),
                        ];
                    }, $tipo_de_proyecto);
        
                    $output['has_tipo_de_investigacion'] = true;
                    $output['tipo_de_investigacion'] = $out;
                }
            }

            if (is_singular('actividad')) {
                $tipo_de_actividad = get_the_terms($post->post_id, 'tipo_de_actividad');

                if ($tipo_de_actividad) {
                    $out = array_map( function($term){
                        return [
                            'term' => $term,
                            'link' => get_term_link($term),
                        ];
                    }, $tipo_de_actividad);
        
                    $output['has_tipo_de_actividad'] = true;
                    $output['tipo_de_actividad'] = $out;
                    $output['localizacion'] = get_field('localizacion');

                }
            }

            if (is_singular('publicacion')) {
                $tipo = get_field('publi_tipo');
                $publicacion = $tipo == 'Revista' ? get_field('publi_revista') : null;
                $isbn = get_field('publi_isbn');
                $fecha_publi = get_field('publi_fecha_publi');

                $output['publicacion'] = [
                    'tipo' => $tipo,
                    'publicacion' => $publicacion,
                    'isbn' => $isbn,
                    'fecha_publi' => $fecha_publi,
                ];
            }

            return $output;
        }

    }

}
