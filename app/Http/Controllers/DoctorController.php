<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('backend.pages.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string',
            'specialization'        => 'required',
            'image'                 => 'required|file|max:2000', // Make image required
            'phone'                 => 'nullable',
            'email'                 => 'required|email',
            'address'               => 'nullable',
            'title'                 => 'nullable',
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $images=null;
        if ($request->hasFile('image')) {
            $images=date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $images, 'public');
        }

        Doctor::create([
            "name"                 => $request->name,
            "specialization"       => $request->specialization,
            "image"                =>$images,
            "phone"                => $request->phone,
            "email"                => $request->email,
            "address"              => $request->address,
            'title'                => $request->title,
        ]);
        Alert::success('success','Doctors updated successfully');
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        $doctor->load('appointments', 'surgeryDetails');

        return view('backend.pages.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('backend.pages.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$doctor)
    {

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string',
            'specialization'        => 'required',
            'image'                 => 'required|file|max:2000', // Make image required
            'phone'                 => 'nullable',
            'email'                 => 'required|email',
            'address'               => 'nullable',
            'title'                 => 'nullable',
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $images=null;
        if ($request->hasFile('image')) {
            $images=date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $images, 'public');
        }
       $doctor = Doctor::find($doctor);

        $doctor->update([

            "name"                 => $request->name,
            "specialization"       => $request->specialization,
            "image"                =>$images,
            "phone"                => $request->phone,
            "email"                => $request->email,
            "address"              => $request->address,
            'title'                => $request->title,

        ]);
        Alert::success('success','Doctors updated successfully');
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index');
    }

    public function frontendShow()
    {
        $doctors = Doctor::all();

        return view('frontend.pages.doctor.doctor', compact('doctors'));
    }

    public function form(){
        return view('basicform.form');
    }

    public function table(){
        return view('basicform.table');
    }
}
