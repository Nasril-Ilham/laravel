<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'selamat datang';
    }

    public function about(){
        return 'Nama : Mohammad nasril ilham , NIM : 24552021016 , Kelas : TI24A1';
    }

    public function articel($id){
        return 'Halaman articel dengan id : '.$id . ' DARI PageController';
    }
}
