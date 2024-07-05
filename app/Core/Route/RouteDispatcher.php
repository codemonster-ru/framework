<?php

namespace App\Core\Route;

use JetBrains\PhpStorm\NoReturn;

class RouteDispatcher
{
    private string $requestUri = '';
    private array $paramMap = [];
    private array $paramRequestMap = [];
    private RouteConfiguration $routeConfiguration;

    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process(): void
    {
        $this->saveRequestUri();
        $this->setParamMap();
        $this->makeRegexRequest();
        $this->run();
    }

    private function saveRequestUri(): void
    {
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
            $this->routeConfiguration->route = $this->clean($this->routeConfiguration->route);
        }
    }

    private function clean(string $string): string
    {
        return preg_replace('/(^\/)|(\/$)/', '', $string);
    }

    private function setParamMap(): void
    {
        $routeArray = explode('/', $this->routeConfiguration->route);

        foreach ($routeArray as $paramKey => $param) {
            if (preg_match('/{.*}/', $param))
                $this->paramMap[$paramKey] = preg_replace('/(^{)|(}$)/', '', $param);
        }
    }

    private function makeRegexRequest(): void
    {
        $requestUriArray = explode('/', $this->requestUri);

        foreach ($this->paramMap as $paramKey => $param) {
            if (!isset($requestUriArray[$paramKey])) return;

            $this->paramRequestMap[$param] = $requestUriArray[$paramKey];

            $requestUriArray[$paramKey] = '{.*}';
        }

        $this->requestUri = implode('/', $requestUriArray);

        $this->prepareRegex();
    }

    private function prepareRegex(): void
    {
        $this->requestUri = str_replace('/', '\/', $this->requestUri);
    }

    private function run(): void
    {
        if (preg_match("/$this->requestUri/", $this->routeConfiguration->route))
            $this->render();
    }

    #[NoReturn] private function render(): void
    {
        $controller = $this->routeConfiguration->controller;
        $action = $this->routeConfiguration->action;

        print((new $controller)->$action(...$this->paramRequestMap));

        die();
    }
}
