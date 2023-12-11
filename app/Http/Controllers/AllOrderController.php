<?php

namespace App\Http\Controllers;

use App\Models\Statse;
use App\Models\Checkout;
use Illuminate\Http\Request;

class AllOrderController extends Controller
{
    function index()
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c' && auth()->user()->email !== 'j@d.c') {
            abort(403);
        }

        $order = Checkout::all();

        return view('allorder', [
            'orders' => $order
        ]);
    }

    function show($id)
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c') {
            abort(403);
        }

        $checkout = Checkout::find($id);
        $stats = Statse::all();

        return view('editall', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    function update(Request $req)
    {
        $update = Checkout::find($req->id);
        $update->user_name = $req->user_name;
        $update->from = $req->from;
        $update->to = $req->to;
        $update->weight = $req->weight;
        $update->parcel_amount = $req->parcel_amount;
        $update->payment_method = $req->payment_method;
        $update->payment_status = $req->payment_status;
        $update->tracking_id = $req->tracking_id;
        $update->current_status = $req->current_status;
        $update->remarks = $req->remarks;
        $update->save();
        return redirect('allorder');
    }
}
