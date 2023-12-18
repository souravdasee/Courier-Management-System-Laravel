<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Role;
use App\Models\Update;
use Illuminate\Http\Request;

class AllOrderController extends Controller
{
    function index()
    {
        $order = Checkout::with("user")->orderBy('id', 'desc')->Paginate(10);
        $role = Role::with('role');

        return view('allorder', [
            'orders' => $order,
            'roles' => $role
        ]);
    }

    function show($id)
    {
        $checkout = Checkout::find($id);
        $stats = Update::all();

        return view('editall', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    function update(Request $req)
    {
        request()->validate([
            'users_name' => 'required | string | max:255',
            'from' => 'required | string',
            'to' => 'required | string',
            'weight' => 'required',
            'parcel_amounts' => 'required | integer',
            'payment_method' => 'required | string',
            'payment_status' => 'required | string',
            'tracking_id' => 'required | integer',
            'current_status' => 'required | string',
            'current_location' => 'required | string'
        ]);

        $update = Checkout::find($req->id);

        $update->users_name = $req->users_name;
        $update->from = $req->from;
        $update->to = $req->to;
        $update->weight = $req->weight;
        $update->parcel_amounts = $req->parcel_amounts;
        $update->payment_method = $req->payment_method;
        $update->payment_status = $req->payment_status;
        $update->tracking_id = $req->tracking_id;
        $update->current_status = $req->current_status;
        $update->current_location = $req->current_location;
        $update->remarks = $req->remarks;

        $update->save();
        return redirect('allorder');
    }
}
