<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Usuarios;
use App\Fields\Partials\Destacados;

class Post extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $entrada = new FieldsBuilder('entrada');

        $entrada
            ->setLocation('post_type', '==', 'proyecto')
            ->or('post_type', '==', 'noticia')
            ->or('post_type', '==', 'publicacion')
            ->or('post_type', '==', 'actividad')
            ->or('post_type', '==', 'investigacion')
            ->or('post_type', '==', 'transferencia');

        $entrada
            ->addTab('Equipo', ['placement' => 'left'])
                ->addFields($this->get(Usuarios::class))
            ->addTab('Destacar')
                ->addFields($this->get(Destacados::class))
            ->addTab('Documentos')
            ->addRepeater('documentos_asociados', [
                'label' => 'Documentos asociados',
                'instructions' => 'Subir aquí los documentos asociados a esta entrada',
                'min' => 1,
                'max' => 7,
                'button_label' => 'Añadir documento',
                'layout' => 'block',
            ])
                    ->addFile('documento_asociado', [
                        'label' => 'Documento asociado',
                        'instructions' => '',
                        'required' => 0,
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_size' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ])
                    ->endRepeater();

        return $entrada->build();
    }
}
