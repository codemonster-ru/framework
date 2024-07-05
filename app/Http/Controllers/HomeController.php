<?php

namespace App\Http\Controllers;

use App\Core\View\View;

class HomeController extends Controller
{
    public function index($get): string
    {
        return View::view('index', compact('get'));
    }

    public function post($post): string
    {
        return View::view('post', compact('post'));
    }
}