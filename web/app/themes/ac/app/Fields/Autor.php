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
                ]);
    

        return $autor->build();
    }
}
