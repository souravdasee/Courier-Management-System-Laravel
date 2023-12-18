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
        $location = Location::all();
        $courier = Courier::all();

        return view('book', [
            'locations' => $location,
            'couriers' => $courier
        ]);
    }

    public function create(Request $req)
    {
        request()->validate([
            'from' => 'required | string',
            'to' => 'required | string',
            'weight' => 'required',
            'sender_name' => 'required | string',
            'recipient_name' => 'required | string',
            'item_type' => 'string',
            'sender_address' => 'required | string | max: 255',
            'recipient_address' => 'required | string | max: 255',
        ]);

        $courier = new Courier;

        $courier->users_id = $req->user()->id;
        $courier->from = $req->from;
        $courier->to = $req->to;
        $courier->weight = $req->weight;
        $courier->sender_name = $req->sender_name;
        $courier->recipient_name = $req->recipient_name;
        $courier->item_type = $req->item_type;
        $courier->sender_address = $req->sender_address;
        $courier->recipient_address = $req->recipient_address;

        $courier->save();
        return redirect('payment');
    }
}
