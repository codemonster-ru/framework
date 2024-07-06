<?php

namespace App\Core;

use App\Core\Route\Route;
use App\Core\Route\RouteDispatcher;
use ReflectionException;

class App
{
    /**
     * @throws ReflectionException
     */
    public static function run(): void
    {
        $methodName = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $methodName = "getRoutes$methodName";

        foreach (Route::$methodName() as $routeConfiguration)
            (new RouteDispatcher($routeConfiguration))->process();
    }
}
