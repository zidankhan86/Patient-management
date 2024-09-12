<?php

namespace App\Http\Controllers\frontend;

use App\Models\Doctor;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $doctors = Doctor::all();
        return view('frontend.pages.home',compact('doctors'));
    }
}
