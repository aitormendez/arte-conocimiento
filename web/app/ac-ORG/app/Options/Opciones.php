<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Opciones extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Opciones';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Opciones del tema';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('options');

        $options
            ->addTab('Equipo', ['placement' => 'left'])
                // ->addUser('user_field', [
                //     'label' => 'User Field',
                //     'instructions' => '',
                //     'required' => 0,
                //     'conditional_logic' => [],
                //     'wrapper' => [
                //         'width' => '',
                //         'class' => '',
                //         'id' => '',
                //     ],
                //     'role' => '',
                //     'allow_null' => 0,
                //     'multiple' => 1,
                // ])
                ;

        return $options->build();
    }
}