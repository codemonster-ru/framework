<?php

use JetBrains\PhpStorm\NoReturn;

if (!function_exists('dd')) {
    #[NoReturn] function dd($data = []): void
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}