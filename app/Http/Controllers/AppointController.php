<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AppointController extends Controller
{
    public function index()
    {
   
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('frontend.pages.appointment.index', compact('patients','doctors'));
    }
}
