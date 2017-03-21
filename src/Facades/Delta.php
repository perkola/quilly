<?php

namespace Perkola\Quilly\Facades;

use Illuminate\Support\Facades\Facade;

class Delta extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'delta';
    }
}
