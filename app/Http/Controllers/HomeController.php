<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('/login'); // pastikan view 'home.blade.php' ada di folder 'resources/views/'
    }
}
