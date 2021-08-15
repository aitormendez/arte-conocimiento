<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Autor extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        
        $autor = new FieldsBuilder('otros_datos');

        $autor
            ->setLocation('user_role', '==', 'all');

        $autor
            ->addTab('Contenido')
                ->addPostObject('pagina_de_usuario', [
                    'label' => 'Página de usuario',
                    'instructions' => 'El contenido de la página seleccionada será mostrado en la página de este usuario',
                    'required' => 0,
                    'post_type' => ['page'],
                    'allow_null' => 0,
                    'multiple' => 0,
                    'return_format' => 'object',
                    'ui' => 1,
                ])
            ->addTab('Foto')
                ->addImage('autor_foto', [
                    'label' => 'Foto del usuario',
                    'instructions' => 'Debe tener 1024 px x 1024px',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '1024',
                    'min_height' => '1024',
                    'min_size' => '',
                    'max_width' => '1024',
                    'max_height' => '1024',
                    'max_size' => '',
                    'mime_types' => '',
                ])
            ->addTab('lineas_de_investigación')
                ->addCheckbox('autor_lineas', [
                    'label' => 'Líneas de investigación',
                    'instructions' => 'Selecciona las líneas de investigación en las que trabaja este autor',
                    // 'choices' => [],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ]);

    

        return $autor->build();
    }
}



