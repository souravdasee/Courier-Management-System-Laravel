<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\ParcelAmount;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    function index()
    {
        $courier = Courier::latest()->first();
        $parcelamount = ParcelAmount::all();

        return view('payment', [
            'couriers' => $courier
        ], [
            'parcelamounts' => $parcelamount
                ->where('from', '=', $courier->from)
                ->where('to', '=', $courier->to)
        ]);
    }

    function addData(Request $req)
    {
        $courier = new Payment;
        $courier->user_id = $req->user()->id;
        $courier->method = $req->method;
        $courier->save();
        return redirect('checkout');
    }
}
