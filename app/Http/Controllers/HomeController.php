<?php

namespace App\Http\Controllers;

use App\Core\Request\Request;
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

    public function post(Request $request, $get): string
    {
        return View::view('post', ['get' => $get, 'post' => $request->post()]);
    }
}