<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Usuarios;

class Metaproyecto extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $metaproyecto = new FieldsBuilder('grupo');

        $metaproyecto
            ->setLocation('taxonomy', '==', 'metaproyecto');

        $metaproyecto
            ->addFields($this->get(Usuarios::class))
            ->addDatePicker('metaproyecto_fecha_inicio', [
                'label' => 'Fecha de inicio',
                'instructions' => '',
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ]) 
            ->addDatePicker('metaproyecto_fecha_fin', [
                'label' => 'Fecha de finalización',
                'instructions' => '',
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ]);


        return $metaproyecto->build();
    }
}
