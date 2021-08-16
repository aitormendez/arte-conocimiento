<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Author extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'author',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'foto' => $this->foto(),
            'lineas_de_trabajo' => $this->lineas_de_trabajo(),
        ];
    }

    /**
     * Returns ACF foto_autor.
     *
     * @return string
     */
    public function foto()
    {
        $q = get_queried_object();
        $foto = get_field('autor_foto', 'user_' . $q->ID);

        $out = [
            'foto' => $foto,
        ];

        if ($foto) {
            $srcset = wp_get_attachment_image_srcset($foto['ID']);
            if ($srcset) {   
                $out['srcset'] = $srcset;
            }
        }
        
        return $out;
    }

    /**
     * Returns líneas de trabajo.
     *
     * @return string
     */
    public function lineas_de_trabajo()
    {
        $q = get_queried_object();
        $lineas = get_field('autor_lineas', 'user_' . $q->ID);

        $out = [];

        if ($lineas) {
            $out = array_map( function($linea) {
                $term = get_term_by( 'slug', $linea, 'lineas_investigacion');
                return [
                    'slug' => $linea,
                    'name' => $term->name,
                    'link' => get_term_link($term->term_id),
                ];
            }, $lineas);
        }
        

 
        
        return $out;
    }


}
