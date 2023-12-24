<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Payment;
use App\Models\Distance;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function index()
    {
        $courier = Courier::latest()->first();
        $weight = ($courier->weight) * 1000;
        $distance = ($courier->distance) * 1000;

        $price = Distance::where('min_distance', '<=', $distance)
            ->where(function ($query) use ($distance) {
                $query->where('max_distance', '>=', $distance)
                    ->orWhereNull('max_distance');
            })
            ->whereHas('weight', function ($query) use ($weight) {
                $query->where('min_weight', '<=', $weight)
                    ->where(function ($query) use ($weight) {
                        $query->where('max_weight', '>=', $weight)
                            ->orWhereNull('max_weight');
                    });
            })
            ->value('price');

        return view('payment', [
            'couriers' => $courier,
            'parcelamounts' => $price
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
