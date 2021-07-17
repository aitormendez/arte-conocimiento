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
                'instructions' => 'Activa para destacar en portada esta entrada. A continuación podrás elegir distintas opciones para dar formato a la entrada',
                'required' => 0,
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Activado',
                'ui_off_text' => 'Desactivado',
            ])
            ->addRadio('destacar_imagen_texto', [
                'label' => 'Imagen o texto',
                'instructions' => 'Aquí decides si el destacado llevará una imagen o un texto corto',
                'choices' => [
                    'imagen' => 'Imagen',
                    'texto' => 'Texto',
                ],
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
            ])
                ->conditional('destacar', '==', 1)
            ->addImage('imagen_destacada', [
                'label' => 'Imagen para el destacado',
                'instructions' => 'Debe tener un tamaño de 1500 x 1500 px.',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '1500',
                'min_height' => '1500',
                'min_size' => '',
                'max_width' => '1500',
                'max_height' => '1500',
                'max_size' => '',
                'mime_types' => '',
            ])
                ->conditional('destacar_imagen_texto', '==', 'imagen')
            ->addTextarea('destacar_texto', [
                'label' => 'Texto para el destacado',
                'instructions' => 'Ten cuidado con la extensión del texto. Cada formato elegido requiere una cantidad de texto diferente. Se recomienda comprobar cómo queda en portada y ajustar en caso necesario.',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'Escribe una introducción corta',
                'maxlength' => '2000',
                'rows' => '',
                'new_lines' => 'wpautop', // Possible values are 'wpautop', 'br', or ''.
            ])
                ->conditional('destacar_imagen_texto', '==', 'texto')
            ->addRadio('destacar_formato', [
                'label' => 'Formato',
                'instructions' => 'Elige entre tres formatos disponibles',
                'choices' => [
                    'vertical' => 'Vertical',
                    'horizontal' => 'Horizontal',
                    'cuadrado' => 'Cuadrado',
                ],
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
            ])
                ->conditional('destacar', '==', 1)
            ->addRadio('destacar_tamano', [
                'label' => 'Tamaño',
                'instructions' => 'Elige entre dos tamaños disponibles',
                'choices' => [
                    'grande' => 'Grande',
                    'pequeño' => 'Pequeño',
                ],
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
            ])
                ->conditional('destacar', '==', 1);
        ;
        

        return $destacados;
    }
}

