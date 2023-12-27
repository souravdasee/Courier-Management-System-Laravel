<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Location;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        $courier = Courier::all();

        return view('book', [
            'couriers' => $courier
        ]);
    }

    public function create(Request $req)
    {
        request()->validate([
            'sender_name' => 'required | string | max:255',
            'recipient_name' => 'required | string | max:255',
            'weight' => 'required | decimal:0,2 | max:50000',
            'sender_number' => 'required | numeric | min:6000000000 | max:9999999999',
            'recipient_number' => 'required | numeric | min:6000000000 | max:9999999999',
            'from' => 'required | string',
            'to' => 'required | string',
            'sender_address' => 'required | string | max: 255',
            'recipient_address' => 'required | string | max: 255',
            'distance' => 'required | numeric'
        ]);

        $courier = new Courier;

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

        $courier->save();
        return redirect('payment');
    }

    public function prepaymentcheck()
    {
        return view('prepaymentcheck');
    }
}
