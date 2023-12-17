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
        return view('dashboard', [
            'locations' => $location
        ]);
    }

    function addData(Request $req)
    {
        request()->validate([
            'from' => 'required | string',
            'to' => 'required | string',
            'weight' => 'required'
        ]);

        $courier = new Courier;

        $courier->users_id = $req->user()->id;
        $courier->from = $req->from;
        $courier->to = $req->to;
        $courier->weight = $req->weight;

        $courier->save();
        return redirect('payment');
    }
}
