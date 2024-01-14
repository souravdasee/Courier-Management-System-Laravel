<?php

namespace App\Http\Controllers;

use App\Models\ArchiveOrder;
use App\Models\Checkout;
use App\Models\Update;
use Illuminate\Http\Request;

class AllOrderController extends Controller
{
    public function index()
    {
        $order = Checkout::with("user")->latest()->filter(request(['search']))->paginate(10)->withQueryString();

        return view('allorder', [
            'orders' => $order
        ]);
    }

    public function show($id)
    {
        $checkout = Checkout::find($id);
        $stats = Update::all();

        return view('editall', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    public function update(Request $req)
    {
        request()->validate([
            'users_name' => 'required | string | max:255',
            'sender_name' => 'required | string | max:255',
            'recipient_name' => 'required | string | max:255',
            'sender_number' => 'required | numeric | min:6000000000 | max:9999999999',
            'recipient_number' => 'required | numeric | min:6000000000 | max:9999999999',
            'sender_address' => 'required | string | max:255',
            'recipient_address' => 'required | string | max:255',
            'from' => 'required | string | max:255',
            'to' => 'required | string | max:255',
            'distance' => 'required | decimal:0,2 | max:50000000',
            'weight' => 'required | decimal:0,2 | max:50000',
            'parcel_amounts' => 'required | integer | min:20 | max:1200',
            'payment_method' => 'required | string | max:255',
            'payment_status' => 'required | string | max:255',
            'tracking_id' => 'required | integer | min:1000000000 | max:9999999999',
            'current_status' => 'required | string | max:255',
            'current_location' => 'required | string',
            'remarks' => 'string | max:255 | nullable'
        ]);

        $update = Checkout::find($req->id);

        $update->users_name = $req->users_name;
        $update->sender_name = $req->sender_name;
        $update->recipient_name = $req->recipient_name;
        $update->sender_number = $req->sender_number;
        $update->recipient_number = $req->recipient_number;
        $update->sender_address = $req->sender_address;
        $update->recipient_address = $req->recipient_address;
        $update->from = $req->from;
        $update->to = $req->to;
        $update->weight = $req->weight;
        $update->distance = $req->distance;
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

    public function archive()
    {
        $archiveOrder = Checkout::onlyTrashed()->paginate(10);

        return view('archive-order', [
            'archiveorders' => $archiveOrder
        ]);
    }
}
