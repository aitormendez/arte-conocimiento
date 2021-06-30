<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Usuarios;

class Post extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $equipo = new FieldsBuilder('posts_usuarios');

        $equipo
            ->setLocation('post_type', '==', 'proyecto')
            ->or('post_type', '==', 'noticia')
            ->or('post_type', '==', 'publicacion')
            ->or('post_type', '==', 'actividad');

        $equipo
        ->addTab('Equipo', ['placement' => 'left'])
        ->addFields($this->get(Usuarios::class));


        return $equipo->build();
    }
}
