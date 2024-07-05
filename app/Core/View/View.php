<?php

namespace App\Core\View;

class View
{
    private static string $path;
    private static ?array $data;

    public static function view(string $string, array $data = []): string
    {
        self::$data = $data;

        $path = str_replace('public', 'resources/views', $_SERVER['DOCUMENT_ROOT']);

        self::$path = $path . str_replace('.', '/', $string) . '.php';

        return self::getContent();
    }

    private static function getContent(): false|string
    {
        extract(self::$data);

        ob_start();

        include self::$path;

        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }
}
