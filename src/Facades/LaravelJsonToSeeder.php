<?php

namespace Preshy\LaravelJsonToSeeder\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelJsonToSeeder extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveljsontoseeder';
    }
}
