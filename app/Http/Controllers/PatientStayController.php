<?php

namespace App\Http\Controllers;

use App\Models\PatientStay;
use Illuminate\Http\Request;

class PatientStayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientStays = PatientStay::all();

        return view('patient-stays.index', compact('patientStays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient-stays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'bed_no' => 'required|integer',
            'admission_date' => 'required|date',
            'release_date' => 'nullable|date',
            'reason' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        PatientStay::create($request->all());

        return redirect()->route('patient-stays.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientStay $patientStay)
    {
        return view('patient-stays.show', compact('patientStay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientStay $patientStay)
    {
        return view('patient-stays.edit', compact('patientStay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientStay $patientStay)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'bed_no' => 'required|integer',
            'admission_date' => 'required|date',
            'release_date' => 'nullable|date',
            'reason' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $patientStay->update($request->all());

        return redirect()->route('patient-stays.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientStay $patientStay)
    {
        $patientStay->delete();

        return redirect()->route('patient-stays.index');
    }
}
