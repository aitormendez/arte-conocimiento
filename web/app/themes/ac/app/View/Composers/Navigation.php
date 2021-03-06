<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Facades\Navi;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'navigation_desktop' => $this->navigation(),
            'mobile_navigation' => $this->mobileNavigation(),
        ];
    }

    /**
     * Returns the primary navigation.
     *
     * @return array
     */
    public function navigation()
    {
        if (Navi::build()->isEmpty()) {
            return;
        }

        return Navi::build()->toArray();
    }

    /**
     * Returns the mobile_navigation.
     *
     * @return array
     */
    public function mobileNavigation()
    {
        if (Navi::build('mobile_navigation')->isEmpty()) {
            return;
        }

        return Navi::build('mobile_navigation')->toArray();
    }
}
