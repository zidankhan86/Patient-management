<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function dashboard()
    {

        $users = User::latest()->get();
        $totalDoctors = Doctor::get()->count();
        $totalUsers = User::get()->count();
        $totalAppoints = Appointment::get()->count();
        $totalPatient = Patient::get()->count();

        return view('backend.pages.dashboard', compact('users', 'totalUsers','totalDoctors','totalAppoints','totalPatient'));
    }
}
