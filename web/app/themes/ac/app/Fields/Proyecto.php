<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Usuarios;

class Proyecto extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $proyecto = new FieldsBuilder('grupo');

        $proyecto
            ->setLocation('taxonomy', '==', 'proyecto');

        $proyecto
            ->addFields($this->get(Usuarios::class))
            ->addDatePicker('proyecto_fecha_inicio', [
                'label' => 'Fecha de inicio',
                'instructions' => '',
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ]) 
            ->addDatePicker('proyecto_fecha_fin', [
                'label' => 'Fecha de finalización',
                'instructions' => '',
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ]);


        return $proyecto->build();
    }
}
