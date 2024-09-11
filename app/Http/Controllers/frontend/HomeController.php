<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerOne;
use App\Models\BannerTwo;
use App\Models\HeroBanner;
use App\Models\ProductRating;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function home(){


         return view('frontend.pages.home');
    }

}
