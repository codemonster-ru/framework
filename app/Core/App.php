<?php

namespace App\Core;

use App\Core\Route\Route;
use App\Core\Route\RouteDispatcher;

class App
{
    public static function run(): void
    {
        $methodName = "getRoutes" . ucfirst(strtolower($_SERVER['REQUEST_METHOD']));

        foreach (Route::$methodName() as $routeConfiguration)
            (new RouteDispatcher($routeConfiguration))->process();
    }
}
