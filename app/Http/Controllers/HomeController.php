<?php

namespace App\Http\Controllers;

use App\Core\View\View;

class HomeController extends Controller
{
    public function index(): string
    {
        return View::view('index');
    }

    public function get($get): string
    {
        return View::view('get', compact('get'));
    }

    public function post($get): string
    {
        $post = [
            'id' => 2
        ];

        return View::view('post', ['get' => $get, 'post' => $post]);
    }
}