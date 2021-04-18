<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Equipo extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $page = get_page_by_path( 'equipo' );

        $equipo = new FieldsBuilder('miembros_y_roles');

        $equipo
            ->setLocation('page', '==', $page->ID);

        $equipo
            ->addUser('director', [
                'label' => 'Director',
                'instructions' => 'Añade aquí el director o los directores del equipo de investigación',
                'role' => '',
                'allow_null' => 0,
                'multiple' => 1,
            ])
            ->addUser('miembro', [
                'label' => 'Miembros',
                'instructions' => 'Añade aquí los miembros del equipo de investigación',
                'role' => '',
                'allow_null' => 0,
                'multiple' => 1,
            ]);

        return $equipo->build();
    }
}
