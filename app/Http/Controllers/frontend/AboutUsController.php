<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function about()
    {
        return view('frontend.pages.about.about');
    }
}
