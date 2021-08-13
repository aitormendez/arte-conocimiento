<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Actividad extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {

        $activ = new FieldsBuilder('actividad');

        $activ
            ->setLocation('post_type', '==', 'actividad');

        $activ
            ->addGoogleMap('localizacion', [
                'label' => 'Localización',
                'instructions' => '',
                'center_lat' => '40.4399496',
                'center_lng' => '-3.7360811',
                'zoom' => '',
                'height' => '',
            ])

            ;



        return $activ->build();
    }
}
