<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AppointController extends Controller
{
    public function index()
    {
   
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('frontend.pages.appointment.index', compact('patients','doctors'));
    }

    public function appoint_store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'type' => 'required|in:Consultancy,OT/Operation',
            'status' => 'required|in:Scheduled,Completed,Cancelled',
        ]);

        Appointment::create($request->all());
        Alert::success('success','Appointment Confirmed');
        return redirect()->back();
    }
}
