<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Post extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $post = new FieldsBuilder('post');

        $post
            ->setLocation('post_type', '==', 'post');

        $post
            ->addRepeater('asdasdasd')
                ->addText('asdasdasdasd')
            ->endRepeater();

        return $post->build();
    }
}
