<?php

namespace YPC\Ripple\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Ripple extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ripple';
    }
}
