<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Location;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function show()
    {
        $location = Location::all();
        $courier = Courier::all();

        return view('dashboard', [
            'locations' => $location,
            'couriers' => $courier
        ]);
    }

    function addData(Request $req)
    {
        // request()->validate([
        //     'from' => 'required | string',
        //     'to' => 'required | string',
        //     'weight' => 'required',
        //     'sender_name' => 'required | string',
        //     'recipient_name' => 'required | string',
        //     'item_type' => 'string',
        //     'sender_adderss' => 'required | string | max: 255',
        //     'recipient_adderss' => 'required | string | max: 255',
        // ]);

        $courier = new Courier;

        $courier->users_id = $req->user()->id;
        $courier->from = $req->from;
        $courier->to = $req->to;
        $courier->weight = $req->weight;
        $courier->distance = $req->distance;
        $courier->sender_name = $req->sender_name;
        $courier->recipient_name = $req->recipient_name;
        $courier->item_type = $req->item_type;
        $courier->sender_adderss = $req->sender_adderss;
        $courier->recipient_adderss = $req->recipient_adderss;

        $courier->save();
        return redirect('payment');
    }
}
