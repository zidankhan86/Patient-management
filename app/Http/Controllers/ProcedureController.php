<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procedures = Procedure::all();

        return view('procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('procedures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'required|exists:appointments,id',
            'procedure_type' => 'required|in:Consultancy,Surgery,Diagnostic',
            'procedure_details' => 'required|string',
            'performed_at' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        Procedure::create($request->all());
        Alert::success('success','Procedure created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Procedure $procedure)
    {
        return view('procedures.show', compact('procedure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Procedure $procedure)
    {
        return view('procedures.edit', compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Procedure $procedure)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'required|exists:appointments,id',
            'procedure_type' => 'required|in:Consultancy,Surgery,Diagnostic',
            'procedure_details' => 'required|string',
            'performed_at' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $procedure->update($request->all());
        Alert::success('success','Procedure updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        Alert::success('success','Procedure deleted successfully');

        return redirect()->back();
    }
}
