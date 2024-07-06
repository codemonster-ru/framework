<?php

namespace App\Core\Route;

class Route
{
    private static array $routesGet = [];
    private static array $routesPost = [];

    public static function getRoutesGet(): array
    {
        return self::$routesGet;
    }

    public static function getRoutesPost(): array
    {
        return self::$routesPost;
    }

    public static function get(string $route, array $controller): RouteConfiguration
    {
        return self::$routesGet[] = new RouteConfiguration($route, $controller[0], $controller[1]);
    }

    public static function post(string $route, array $controller): RouteConfiguration
    {
        return self::$routesPost[] = new RouteConfiguration($route, $controller[0], $controller[1]);
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
    }
}
