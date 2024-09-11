<?php

namespace App\Http\Controllers;

use App\Models\SurgeryDetail;
use Illuminate\Http\Request;

class SurgeryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surgeryDetails = SurgeryDetail::all();

        return view('surgery-details.index', compact('surgeryDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surgery-details.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'surgery_type' => 'required|string|max:100',
            'surgery_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        SurgeryDetail::create($request->all());

        return redirect()->route('surgery-details.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SurgeryDetail $surgeryDetail)
    {
        return view('surgery-details.show', compact('surgeryDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurgeryDetail $surgeryDetail)
    {
        return view('surgery-details.edit', compact('surgeryDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurgeryDetail $surgeryDetail)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'surgery_type' => 'required|string|max:100',
            'surgery_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $surgeryDetail->update($request->all());

        return redirect()->route('surgery-details.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurgeryDetail $surgeryDetail)
    {
        $surgeryDetail->delete();

        return redirect()->route('surgery-details.index');
    }
}
