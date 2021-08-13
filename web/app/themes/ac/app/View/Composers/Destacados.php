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
            'post_type'        => ['proyecto', 'noticia', 'actividad', 'publicacion', 'investigacion', 'transferencia'],
            'post_status'      => 'publish',
            'meta_key'		   => 'destacar',
            'meta_value'	   => '1'
        ]);

        $filtros = [];

        foreach ($posts as $post) {
            $post_type = get_post_type( $post->ID );
            if (! in_array($post_type, $filtros)) {
                array_push($filtros, $post_type);
            }
        }



        $posts_array = array_map(function ($post) {
            $contenido = get_field('destacar_imagen_texto', $post->ID);
            $formato = get_field('destacar_formato', $post->ID);
            $tamano = get_field('destacar_tamano', $post->ID);
            $post_type = get_post_type( $post->ID );



            $out = [
                'ID' => $post->ID,
                'post_type' => $post_type,
                'title'     => get_the_title($post->ID),
                'contenido'   => $contenido,
                'formato'   => $formato,
                'tamano'   => $tamano,
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

            } elseif($contenido === 'texto') {
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
            'filtros' => $filtros,
        ];

        if (count($posts) !== 0) {
            $output['has_posts'] = true;
        } else {
            $output['has_posts'] = false;
        }

        return $output;
    }
}
