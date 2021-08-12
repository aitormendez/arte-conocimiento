<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Archivo extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'descripcion' => $this->descripcion(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function descripcion()
    {
        $desc = get_the_archive_description();

        return  $desc ? $desc : false;
    }


}
