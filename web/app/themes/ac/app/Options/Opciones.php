<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Opciones extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Opciones';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Opciones del tema';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('opciones');

        $options
        ->addTab('Roles', ['placement' => 'left'])
            ->addTextarea('roles_usuario', [
                'label' => 'Roles de usuario',
                'instructions' => 'Elige los roles de usuario (personas CON cuenta en esta web). Un rol por línea.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addTextarea('roles_participante', [
                'label' => 'Roles de participante',
                'instructions' => 'Elige los roles de participante (personas SIN cuenta en esta web). Un rol por línea.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ]);

        return $options->build();
    }
}
