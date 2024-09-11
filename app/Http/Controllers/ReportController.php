<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public function report()
    {
        //dd('yes');
        // $oders = Order::all();

        return view('backend.pages.report.report');
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

        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        return view('backend.pages.report.report', compact('orders'));

    }
}
