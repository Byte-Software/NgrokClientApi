<?php

namespace ByteSoftware\NgrokClientApi\Facades;

use Illuminate\Support\Facades\Facade;

class NgrokClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'ngrokclient'; }
}