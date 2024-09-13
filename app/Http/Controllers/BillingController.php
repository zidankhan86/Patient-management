<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::all();

        return view('billing.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('billing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:Pending,Paid,Cancelled',
            'issued_at' => 'required|date',
        ]);

        Billing::create($request->all());
        Alert::success('success','Bill Created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Billing $billing)
    {
        return view('billing.show', compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billing $billing)
    {
        return view('billing.edit', compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:Pending,Paid,Cancelled',
            'issued_at' => 'required|date',
        ]);

        $billing->update($request->all());
        Alert::success('success','Bill Updated Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        $billing->delete();
        Alert::success('success','Bill Deleted Successfully');

        return redirect()->back();
    }
}
