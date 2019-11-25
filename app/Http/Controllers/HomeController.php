<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        return view('home.about');
    }

    public function donate()
    {
        return view('home.donate');
    }
}
