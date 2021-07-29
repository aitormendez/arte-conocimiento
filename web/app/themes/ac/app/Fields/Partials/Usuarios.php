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
        // llenar dinámicamente las choices de roles usuario con un campo en options
        $user_choices_out = [];
        $user_choices = get_field('roles_usuario', 'option', false);
        $user_choices = explode("\n", $user_choices);
        foreach ($user_choices as $key => $value) {
          $user_choices_out[trim(strtolower(str_replace(' ','-',$value))) ] = $value ;
        }

        // llenar dinámicamente las choices de roles participantes con un campo en options
        $participant_choices_out = [];
        $participant_choices = get_field('roles_participante', 'option', false);
        $participant_choices = explode("\n", $participant_choices);
        foreach ($participant_choices as $key => $value) {
          $participant_choices_out[trim(strtolower(str_replace(' ','-',$value))) ] = $value ;
        }


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
                'choices' => $user_choices_out,
                'default_value' => ['Colaborador'],
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
                'choices' => $participant_choices_out,
                'default_value' => ['Colaborador'],
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
