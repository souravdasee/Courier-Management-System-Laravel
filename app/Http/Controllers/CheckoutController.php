<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Courier;
use App\Models\ParcelAmount;
use App\Models\Payment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index(Request $req)
    {
        $courier = Courier::latest()->first();
        $parcelamount = ParcelAmount::all();
        $paymentmethod = Payment::latest()->first();
        $user = User::all();

        return view('checkout', [
            'parcelamounts' => $parcelamount
                ->where('from', '=', $courier->from)
                ->where('to', '=', $courier->to),
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
            'weight' => 'required',
            'parcel_amounts' => 'required | integer',
            'payment_method' => 'required | string',
            'payment_status' => 'required | string',
            'tracking_id' => 'required | integer | min:10'
        ]);

        $parcel = new Checkout();

        $parcel->users_id = $req->user()->id;
        $parcel->users_name = $req->user()->name;
        $parcel->from = $req->from;
        $parcel->to = $req->to;
        $parcel->weight = $req->weight;
        $parcel->parcel_amounts = $req->parcel_amounts;
        $parcel->payment_method = $req->payment_method;
        $parcel->payment_status = $req->payment_status;
        $parcel->tracking_id = $req->tracking_id;
        $parcel->role = $req->user()->role;

        $parcel->save();
        return redirect('order');
    }
}
