<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Usuarios extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $listItems = new FieldsBuilder('Usuarios');

        $listItems
        ->addRepeater('usuarios', [
            'label' => 'Usuarios',
            'instructions' => 'Añade aquí los participantes en el proyecto que SÍ tengan cuenta de usuario en este sitio web. Se añadirán automáticamente los que ya existan en los post asociados a este metaproyecto',
            'layout' => 'table',
            'button_label' => 'Añadir usuario',
        ])
            ->addUser('nombre_usuario', [
                'label' => 'Nombre de usuario',
            ])
            ->addSelect('rol_usuario', [
                'label' => 'Rol de usuario',
                'required' => 1,
                'choices' => [
                    'investigador_principal' => 'Investigador principal',
                    'investigador' => 'Investigador',
                    'doctor' => 'Doctor de equipo',
                    'miembro' => 'Miembro del equipo',
                    'colaborador' => 'Colaborador',
                ],
                'default_value' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'array',
                'placeholder' => '',
            ])
            ->endRepeater()

        ->addRepeater('participantes', [
            'label' => 'Participantes',
            'instructions' => 'Añade aquí los participantes en el proyecto que NO tengan cuenta de usuario en este sitio web. Se añadirán automáticamente los que ya existan en los post asociados a este metaproyecto',
            'layout' => 'table',
            'button_label' => 'Añadir participante',
        ])
            ->addText('nombre_participante', [
                'label' => 'Nombre de participante',
            ])
            ->addSelect('rol_participante', [
                'label' => 'Rol de participante',
                'required' => 1,
                'choices' => [
                    'investigador_principal' => 'Investigador principal',
                    'investigador' => 'Investigador',
                    'doctor' => 'Doctor de equipo',
                    'miembro' => 'Miembro del equipo',
                    'colaborador' => 'Colaborador',
                    'sin_rol' => 'Sin rol',
                ],
                'default_value' => ['colaborador'],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'array',
                'placeholder' => '',
            ])
            ->endRepeater();

        return $listItems;
    }
}
