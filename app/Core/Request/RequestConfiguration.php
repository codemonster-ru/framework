<?php

namespace App\Core\Request;

class RequestConfiguration
{
    public static function query(): array
    {
        return $_GET;
    }

    public static function post(): array
    {
        return $_POST;
    }
}