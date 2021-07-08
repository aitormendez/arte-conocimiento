<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Usuarios;
use App\Fields\Partials\Destacados;

class Post extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $entrada = new FieldsBuilder('entrada');

        $entrada
            ->setLocation('post_type', '==', 'proyecto')
            ->or('post_type', '==', 'noticia')
            ->or('post_type', '==', 'publicacion')
            ->or('post_type', '==', 'actividad');

        $entrada
        ->addTab('Equipo', ['placement' => 'left'])
            ->addFields($this->get(Usuarios::class))
        ->addTab('Destacar')
            ->addFields($this->get(Destacados::class));


        return $entrada->build();
    }
}
