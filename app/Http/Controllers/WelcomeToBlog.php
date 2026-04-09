<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeToBlog extends Controller
{
    public function index1(){
        return view('blog.welcome', ['name' =>  'nasril']);
    }

    //menggunakan with untuk mengirim data ke view
    public function index(){
        return view('blog.welcome')
                 ->with('name', 'nasril')
                 -> with('age', 20)
                 -> with('ocupation', 'programmer');

    }
}
