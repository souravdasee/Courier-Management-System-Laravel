<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Courier;
use App\Models\ParcelAmount;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index()
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
            'users' => $user
        ]);
    }

    function create(Request $req)
    {
        $parcel = new Checkout();
        $parcel->user_id = $req->user()->id;
        $parcel->user_name = $req->user()->name;
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

    function feedback()
    {
        $user = User::all();
        $courier = Courier::latest()->first();
        $parcelamount = ParcelAmount::all();
        $paymentmethod = Payment::latest()->first();
        $checkouts = Checkout::all();

        return view('feedback', [
            'users' => $user,
            'couriers' => $courier,
            'parcelamounts' => $parcelamount
                ->where('from', '=', $courier->from)
                ->where('to', '=', $courier->to),
            'paymentmethods' => $paymentmethod,
            'checkouts' => $checkouts
        ]);
    }

    function updatefeedback(Request $req)
    {
        // ddd(request()->file('image'));
        // request()->file('image')->store('images');
        // return 'Done';

        $feedback = Checkout::find($req->id);

        $feedback->user_id = $req->user()->id;
        $feedback->user_name = $req->user()->name;
        $feedback->from = $req->from;
        $feedback->to = $req->to;
        $feedback->weight = $req->weight;
        $feedback->parcel_amount = $req->parcel_amount;
        $feedback->payment_method = $req->payment_method;
        $feedback->payment_status = $req->payment_status;
        $feedback->tracking_id = $req->tracking_id;
        $feedback->current_status = $req->current_status;
        $feedback->remarks = $req->remarks;
        $feedback->image = $req->file('image')->store('images');
        $feedback->voice = $req->voice;
        $feedback->save();
        return redirect('allorder');

        // $attributes = request()->validate([
        //     'image' => 'required | image'
        // ]);

        // $attributes['user_id'] = auth()->id();
        // $attributes['image'] = request()->file('image')->store('images');

        // Feedback::create($attributes);

        // return redirect('allorder');
    }
}
