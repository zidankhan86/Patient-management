<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contactus.contactus');
    }

    public function contactForm(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Contact::create([

            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

        ]);

        Alert::toast()->success('Thank you for your feedback.');

        return back();

    }
}
