<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articel($id){
        return 'Halaman articel dengan id : '.$id . ' DARI ArticleController';
    }
}
