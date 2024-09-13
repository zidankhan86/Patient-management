<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::all();

        return view('prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prescriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'prescription_details' => 'required|string',
            'issued_at' => 'required|date',
        ]);
    
        // Automatically link the prescription to the appointment's doctor
        $appointment = Appointment::findOrFail($request->appointment_id);
        
        Prescription::create([
            'appointment_id' => $request->appointment_id,
            'doctor_id' => $appointment->doctor_id,  // Automatically set the doctor from the appointment
            'patient_id' => $appointment->patient_id, // Automatically set the patient from the appointment
            'prescription_details' => $request->prescription_details,
            'issued_at' => $request->issued_at,
        ]);
        Alert::success('success','Prescription Created Successfully');

        return redirect()->route('appointments.show', $appointment->id);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        return view('prescriptions.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        $request->validate([
            'prescription_details' => 'required|string',
            'issued_at' => 'required|date',
        ]);
    
        $prescription->update([
            'prescription_details' => $request->input('prescription_details'),
            'issued_at' => $request->input('issued_at'),
        ]);
        Alert::success('success','Prescription Updated Successfully');

        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        Alert::success('success','Prescription Deleted Successfully');

        return redirect()->back();
    }
}
