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
        $role = Role::all();

        return view('editall', [
            'checkouts' => $checkout,
            'statses' => $stats,
            'roles' => $role
        ]);
    }

    function update(Request $req)
    {
        request()->validate([
            'users_name' => 'required | string | max:255',
            'role' => 'required | string | max:255',
            'from' => 'required | string | max:255',
            'to' => 'required | string | max:255',
            'weight' => 'required | decimal:0,2 | max:50000',
            'parcel_amounts' => 'required | integer | min:20 | max:1200',
            'payment_method' => 'required | string | max:255',
            'payment_status' => 'required | string | max:255',
            'tracking_id' => 'required | integer | min:1000000000 | max:9999999999',
            'current_status' => 'required | string | max:255',
            'current_location' => 'required | string',
            'remarks' => 'string | max:255'
        ]);

        $update = Checkout::find($req->id);

        $update->users_name = $req->users_name;
        $update->role = $req->role;
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
        return redirect('allorder')->with('success', 'Order updated');
    }
}
