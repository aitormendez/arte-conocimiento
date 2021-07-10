<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Destacados extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'front-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'destacados' => $this->destacados(),
        ];
    }

    public function destacados()
    {

        $posts = get_posts([
            'posts_per_page'   => -1,
            'post_type'        => ['proyecto', 'noticia', 'actividad', 'publicacion'],
            'post_status'      => 'publish',
            'meta_key'		   => 'destacar',
            'meta_value'	   => '1'
        ]);

        $posts_array = array_map(function ($post) {
            $contenido = get_field('destacar_imagen_texto', $post->ID);
            $formato = get_field('destacar_formato', $post->ID);
            $tamano = get_field('destacar_tamano', $post->ID);

            $post_type = get_post_type( $post->ID );

            if ($post_type === 'proyecto') {
                $post_type = "Proyectos";
            } elseif ($post_type === 'noticia') {
                $post_type = "Noticias";
            } elseif ($post_type === 'actividad') {
                $post_type = "Actividades";
            } elseif ($post_type === 'publicacion') {
                $post_type = "Publicaciones";
            };

            $out = [
                'ID' => $post->ID,
                'post_type' => $post_type,
                'title'     => get_the_title($post->ID),
                'contenido'   => $contenido,
                'formato'   => $formato,
                'tamano'   => $tamano,
                'excerpt'   => get_the_excerpt( $post->ID ),
                'link'      => get_permalink( $post->ID  ),
            ];

            if ($contenido === 'imagen') {

                $img = get_field ('imagen_destacada', $post->ID);
                if ($img) {
                    $out['has_img'] = true;
                    $out['url'] = $img['url'];
                    $out['srcset'] = wp_get_attachment_image_srcset($img['ID']);
                    $out['alt'] = $img['alt'];
                } else {
                    $out['has_img'] = false;
                }

            } elseif($formato === 'texto') {
                $txt = get_field ('destacar_texto', $post->ID);

                if ($txt) {
                    $out['has_txt'] = true;
                    $out['txt'] = $txt;
                } else {
                    $out['has_txt'] = false;
                }

            }

            return $out;
        }, $posts);

        $output = [
            'posts' => $posts_array,
        ];

        if (count($posts) !== 0) {
            $output['has_posts'] = true;
        } else {
            $output['has_posts'] = false;
        }

        return $output;
    }
}
