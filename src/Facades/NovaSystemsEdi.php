<?php

namespace SmartDato\NovaSystemsEdi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmartDato\NovaSystemsEdi\NovaSystemsEdi
 */
class NovaSystemsEdi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SmartDato\NovaSystemsEdi\NovaSystemsEdi::class;
    }
}
