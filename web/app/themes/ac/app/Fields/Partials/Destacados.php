<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Destacados extends Partial
{
    /**
     * The partial field group.
     *
     * @return array
     */
    public function fields()
    {
        $destacados = new FieldsBuilder('Destacados');

        $destacados
            ->addTrueFalse('destacar', [
                'label' => 'Destacar en portada',
                'instructions' => 'Activa para destacar en portada esta entrada',
                'required' => 0,
                'message' => 'mensaje',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Activado',
                'ui_off_text' => 'Desactivado',
            ])
            ->addImage('image_field', [
                'label' => 'Image Field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ])
                ->conditional('destacar', '==', 1);
        ;
        

        return $destacados;
    }
}
