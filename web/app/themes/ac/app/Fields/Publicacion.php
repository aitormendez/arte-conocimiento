<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Publicacion extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $publi = new FieldsBuilder('publicación');

        $publi
            ->setLocation('post_type', '==', 'publicacion');

        $publi
            ->addRadio('publi_tipo', [
                'label' => 'Tipo de publicación',
                'instructions' => '',
                'choices' => [
                    'libro' => 'Libro',
                    'revista' => 'Revista',
                    'catalogo' => 'Catálogo',
                ],
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'libro',
                'layout' => 'vertical',
                'return_format' => 'label',
            ])
            ->addText('publi_revista', [
                'label' => 'Publicación',
                'instructions' => 'Especificar a qué publicación pertenece el ejemplar de la revista',
            ])
                ->conditional('publi_tipo', '==', 'revista')
            ->addText('publi_isbn', [
                'label' => 'ISBN / ISSN',
                'instructions' => '',
            ])
            ->addDatePicker('publi_fecha_publi', [
                'label' => 'Fecha de publicación',
                'instructions' => 'Debe ser la fecha de publicación de la edición, no de esta entrada',
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ])
            ;



        return $publi->build();
    }
}
