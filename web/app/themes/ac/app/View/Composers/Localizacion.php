<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Localizacion extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pag-contacto',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'loc' => $this->equipo(),
        ];
    }

    /**
     * 
     *
     * @return string
     */
    public function equipo()
    {

        $loc = get_field('localizacion_ucm', 'option');
        
        return $loc;
    }


}
