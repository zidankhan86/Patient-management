<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard(){
    
        $totalCategories    = Category::get()->count();
        $users              = User::latest()->get();
        $totalUsers         = User::get()->count();
        
        return view('backend.pages.dashboard',compact('users','totalCategories','totalUsers'));
    }
}
