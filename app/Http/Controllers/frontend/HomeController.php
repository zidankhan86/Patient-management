<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {

        return view('frontend.pages.home');
    }
}
