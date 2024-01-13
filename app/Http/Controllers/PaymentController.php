<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Payment;
use App\Models\Distance;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    function index()
    {
        $courier = Courier::latest()->first();
        $weight = $courier->weight;
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

        $api = new Api(getenv("RAZOR_PAY_API_KEY"), getenv("RAZOR_PAY_SECRET_KEY"));

        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => 39900,
            'currency'        => 'INR'
        ];

        $razorpayOrder = $api->order->create($orderData);

        dd($razorpayOrder);

        return view('payment', [
            'couriers' => $courier,
            'parcelamounts' => $price
        ]);
    }

    function payment(Request $req)
    {
        request()->validate([
            'method' => 'required | string'
        ]);

        $courier = new Payment;

        $courier->users_id = $req->user()->id;
        $courier->sender_name = $req->sender_name;
        $courier->recipient_name = $req->recipient_name;
        $courier->weight = $req->weight;
        $courier->sender_number = $req->sender_number;
        $courier->recipient_number = $req->recipient_number;
        $courier->from = $req->from;
        $courier->to = $req->to;
        $courier->sender_address = $req->sender_address;
        $courier->recipient_address = $req->recipient_address;
        $courier->distance = $req->distance;
        $courier->amount = $req->amount;
        $courier->method = $req->method;

        $courier->save();
        return redirect('checkout');
    }
}
