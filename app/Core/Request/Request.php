<?php

namespace App\Core\Request;

class Request
{
    private static array $paramsGet = [];
    private static array $paramsPost = [];

    public function query(): array
    {
        return self::$paramsGet = RequestConfiguration::query();
    }

    public function post(): array
    {
        return self::$paramsPost = RequestConfiguration::post();
    }

    public function all(): array
    {
        return array_merge($this->query(), $this->post());
    }
}