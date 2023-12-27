<?php

namespace App\Http\Controllers;

use App\Models\Update;
use App\Models\Checkout;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function index()
    {
        $checkout = Checkout::orderBy('id', 'desc')->paginate(10);

        return view('status', [
            'checkouts' => $checkout
        ]);
    }

    public function delivery()
    {
        $checkout = Checkout::where('current_status', '=', 'Out for delivery')->orderBy('id', 'desc')->paginate(10);

        return view(
            'delivery',
            [
                'checkouts' => $checkout
            ]
        );
    }

    public function show($id)
    {
        $checkout = Checkout::find($id);
        $stats = Update::all();

        return view('deliveryupdate', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    public function update(Request $req)
    {
        $update = Checkout::find($req->id);

        request()->validate([
            'payment_status' => 'required | string | max:255',
            'current_status' => 'required | string | max:255',
            'image' => 'required | image',
            'voice' => 'required | file'
        ]);

        $update->current_status = $req->current_status;
        $update->payment_status = $req->payment_status;
        $update->image = $req->file('image')->store('images');
        $update->voice = $req->file('voice')->store('audios');

        $update->save();
        return redirect('delivery')->with('success', 'Delivered');
    }
}
