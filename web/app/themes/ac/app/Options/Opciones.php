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
            ])
        ->addTab('Descripciones de sección')
            ->addTextarea('cpt_actividad_description', [
                'label' => 'Descripción para "Actividades"',
                'instructions' => 'Este texto aparecerá en el encabezado de "Actividades".',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addTextarea('cpt_publicacion_description', [
                'label' => 'Descripción para "Publicaciones"',
                'instructions' => 'Este texto aparecerá en el encabezado de "Publicaciones".',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addTextarea('cpt_investigacion_description', [
                'label' => 'Descripción para "Fomento de la investigación"',
                'instructions' => 'Este texto aparecerá en el encabezado de "Fomento de la investigación".',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addTextarea('cpt_transferencia_description', [
                'label' => 'Descripción para "Transferencia"',
                'instructions' => 'Este texto aparecerá en el encabezado del archivo de "Transferencia".',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '', // Possible values are 'wpautop', 'br', or ''.
            ])
        ->addTab('Faldón')
            ->addWysiwyg('footer', [
                'label' => 'Faldón',
                'instructions' => 'Información para el faldón (aparece en todas las páginas)',
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 1,
            ])
        ->addTab('Equipo')
            ->addUser('equipo', [
                'label' => 'Equipo',
                'instructions' => 'Selecciona los usuarios que aparecerán en la página "Equipo"',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'role' => '',
                'allow_null' => 0,
                'multiple' => 1,
            ]);
    

        return $options->build();
    }
}
