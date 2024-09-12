<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('backend.pages.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('backend.pages.appointment.create',compact('patients','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {

        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('backend.pages.appointment.edit', compact('appointment','patients','doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'type' => 'required|in:Consultancy,OT/Operation',
            'status' => 'required|in:Scheduled,Completed,Cancelled',
        ]);

        $appointment->update($request->all());
        Alert::success('success','Appointment updated successfully');
        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        Alert::warning('warning','Patient deleted successfully');
        return redirect()->route('appointments.index');
    }
}
