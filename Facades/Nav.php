<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 9/8/2018
 * Time: 10:03 AM
 */

namespace Don\NavIP\Facades;
use Illuminate\Support\Facades\Facade;

class Nav extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "nav";
    }
}
