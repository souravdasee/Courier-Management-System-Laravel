<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index(Request $req)
    {
        $courier = Courier::latest()->first();
        $paymentmethod = Payment::latest()->first();
        $user = User::all();

        return view('checkout', [
            'paymentmethods' => $paymentmethod,
            'couriers' => $courier,
            'users' => $user,
            'roles' => $req->user()->role
        ]);
    }

    function create(Request $req)
    {
        request()->validate([
            'from' => 'required | string',
            'to' => 'required | string',
            'weight' => 'required | decimal:0,2 | max:50000',
            'distance' => 'required | numeric',
            'parcel_amounts' => 'required | integer',
            'payment_method' => 'required | string',
            'payment_status' => 'required | string',
            'tracking_id' => 'required | string | min:13 | unique:checkouts,tracking_id'
        ]);

        $parcel = new Checkout();

        $parcel->users_id = $req->user()->id;
        $parcel->users_name = $req->user()->name;
        $parcel->role = $req->user()->role;
        $parcel->from = $req->from;
        $parcel->to = $req->to;
        $parcel->weight = $req->weight;
        $parcel->distance = $req->distance;
        $parcel->parcel_amounts = $req->parcel_amounts;
        $parcel->payment_method = $req->payment_method;
        $parcel->payment_status = $req->payment_status;
        $parcel->tracking_id = $req->tracking_id;
        $parcel->sender_name = $req->sender_name;
        $parcel->recipient_name = $req->recipient_name;
        $parcel->sender_number = $req->sender_number;
        $parcel->recipient_number = $req->recipient_number;
        $parcel->sender_address = $req->sender_address;
        $parcel->recipient_address = $req->recipient_address;

        $parcel->save();
        return redirect('order')->with('success', 'Parcel booked');
    }
}
