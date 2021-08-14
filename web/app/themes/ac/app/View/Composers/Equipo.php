<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Equipo extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pag-equipo',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'equipo' => $this->equipo(),
        ];
    }

    /**
     * 
     *
     * @return string
     */
    public function equipo()
    {

        $equipo = get_field('equipo', 'option');

        $output = array_map( function($persona){

            $foto = get_field('autor_foto', 'user_' . $persona['ID']);


            $out =  [
                'persona' => $persona,
                'link' => get_author_posts_url($persona['ID']),
                'foto' => null,
            ];

            if ($foto) {
                $out['foto'] = $foto;
                $srcset = wp_get_attachment_image_srcset($foto['ID']);
                if ($srcset) {   
                    $out['srcset'] = $srcset;
                }
            }

            return $out;


        }, $equipo);


        
        
        return $output;
    }


}
