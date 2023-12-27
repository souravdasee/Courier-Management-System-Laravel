<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    function index()
    {
        $trackingids = Checkout::latest();

        request()->validate(['search' => 'required | numeric | min:1000000000 | max:9999999999']);

        if (request('search')) {
            $trackingids->where('tracking_id', '=', request('search'));
        }

        if (request('search') == '') {
            abort(403);
        }

        return view('tracking', [
            'checkouts' => $trackingids->get()
        ]);
    }
}
