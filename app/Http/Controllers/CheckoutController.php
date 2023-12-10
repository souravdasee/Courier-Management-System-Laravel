<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Courier;
use App\Models\ParcelAmount;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index()
    {
        $courier = Courier::latest()->first();
        $parcelamount = ParcelAmount::all();
        $paymentmethod = Payment::latest()->first();

        return view('checkout', [
            'parcelamounts' => $parcelamount
                ->where('from', '=', $courier->from)
                ->where('to', '=', $courier->to),
            'paymentmethods' => $paymentmethod,
            'couriers' => $courier
        ]);
    }

    function create(Request $req)
    {
        $parcel = new Checkout();
        $parcel->user_id = $req->user()->id;
        $parcel->from = $req->from;
        $parcel->to = $req->to;
        $parcel->weight = $req->weight;
        $parcel->parcel_amount = $req->parcel_amount;
        $parcel->payment_method = $req->payment_method;
        $parcel->payment_status = $req->payment_status;
        $parcel->tracking_id = $req->tracking_id;
        $parcel->save();
        return redirect('order');
    }
}
