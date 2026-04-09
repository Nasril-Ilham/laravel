<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteControllerView extends Controller
{
    public function index()
    {
        $name = "nasril";
        return view('hallo1', compact('name'));
    }   
}
