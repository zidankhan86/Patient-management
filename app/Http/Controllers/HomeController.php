<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function dashboard()
    {

        $totalCategories = Category::get()->count();
        $users = User::latest()->get();
        $totalUsers = User::get()->count();

        return view('backend.pages.dashboard', compact('users', 'totalCategories', 'totalUsers'));
    }
}
