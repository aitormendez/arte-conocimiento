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

        $equipo = new FieldsBuilder('grupo');

        $equipo
            ->setLocation('taxonomy', '==', 'metaproyecto');

        $equipo
            ->addFields($this->get(Usuarios::class));


        return $equipo->build();
    }
}
