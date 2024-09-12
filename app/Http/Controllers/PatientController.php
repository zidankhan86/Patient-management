<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();

        return view('backend.pages.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'age'           => 'required|integer|min:0',
            'gender'        => 'required|string|in:Male,Female,Other',
            'phone'         => 'required|string|max:20',
            'email'         => 'required|email|max:100|unique:patients,email',
            'address'       => 'nullable|string',
            'patient_type'  => 'required|in:Consultancy,Operation',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new patient record
        Patient::create([
            'name'          => $request->name,
            'age'           => $request->age,
            'gender'        => $request->gender,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'patient_type'  => $request->patient_type,
        ]);

        Alert::success('success','Patient Created successfully');
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('backend.pages.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'age'           => 'required|integer|min:0',
            'gender'        => 'required|string|in:Male,Female,Other',
            'phone'         => 'required|string|max:20',
            'email'         => 'required',
            'address'       => 'nullable|string',
            'patient_type'  => 'required|in:Consultancy,Operation',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient->update([
            'name'          => $request->name,
            'age'           => $request->age,
            'gender'        => $request->gender,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'patient_type'  => $request->patient_type,
        ]);
        Alert::success('success','Patient updated successfully');
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index');
    }
}
