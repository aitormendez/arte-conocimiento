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
        ];
    }

    /**
     * Returns the post title.
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


}
