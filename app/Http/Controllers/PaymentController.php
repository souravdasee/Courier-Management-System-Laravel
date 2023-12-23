<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Courier;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function index()
    {
        $courier = Courier::latest()->first();
        $weight = $courier->weight;
        $distance = $courier->distance;

        $amount = Amount::where('weight', '<=', $weight)
            ->where('distance', '<=', $distance)
            ->orderBy('weight', 'desc')
            ->orderBy('distance', 'desc')
            ->first();

        return view('payment', [
            'couriers' => $courier,
            'parcelamounts' => $amount
        ]);
    }

    function addData(Request $req)
    {
        request()->validate([
            'method' => 'required | string'
        ]);

        $courier = new Payment;

        $courier->users_id = $req->user()->id;
        $courier->method = $req->method;

        $courier->save();
        return redirect('checkout');
    }
}
