<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    function index(Request $req)
    {
        $trackingids = Checkout::latest();
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
