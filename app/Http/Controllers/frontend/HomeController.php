<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function home()
    {
        $doctors = Doctor::all();

        return view('frontend.pages.home', compact('doctors'));
    }
}
