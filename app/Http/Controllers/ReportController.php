<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function report()
    {
        $appointments = Appointment::all();

        return view('backend.pages.report.report', compact('appointments'));
    }

    public function reportSearch(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',
        ]);

        if ($validator->fails()) {

            Alert::error('From date and to date required and to should greater then from date.');

            return redirect()->back();
        }

        $from = $request->from_date;

        $to = $request->to_date;

        $Appointment = Appointment::whereBetween('created_at', [$from, $to])->get();

        return view('backend.pages.report.report', compact('Appointment'));

    }
}
