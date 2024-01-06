<?php

namespace App\Http\Controllers;

use App\Models\Update;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StatusController extends Controller
{
    public function index()
    {
        $checkout = Checkout::latest()->filter(request(['search']))->paginate(10)->withQueryString();

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

    public function receive()
    {
        $checkout = Checkout::latest()->paginate();

        return view('receive-item-status-update', [
            'checkouts' => $checkout
        ]);
    }

    public function updatereceive(Request $req)
    {
        $checkout = Checkout::where('tracking_id', $req->tracking_id)->first();

        if (!$checkout) {
            throw ValidationException::withMessages([
                'tracking_id' => 'No record found for the provided Tracking ID.',
            ]);
        }

        request()->validate([
            'current_location' => 'required | string | max:255',
            'current_status' => 'required | string | max:255',
            'tracking_id' => 'required | string | same:tracking_id'
        ]);

        $checkout->current_location = $req->current_location;
        $checkout->current_status = $req->current_status;
        $checkout->tracking_id = $req->tracking_id;

        $checkout->save();
        return redirect('status/receive')->with('success', 'Item received');
    }

    public function dispatch()
    {
        $checkout = Checkout::latest()->paginate();

        return view('dispatch-item-status-update', [
            'checkouts' => $checkout
        ]);
    }

    public function updatedispatch(Request $req)
    {
        $checkout = Checkout::where('tracking_id', $req->tracking_id)->first();

        if (!$checkout) {
            throw ValidationException::withMessages([
                'tracking_id' => 'No record found for the provided Tracking ID.',
            ]);
        }

        request()->validate([
            'current_location' => 'required | string | max:255',
            'current_status' => 'required | string | max:255',
            'tracking_id' => 'required | string | same:tracking_id'
        ]);

        $checkout->current_location = $req->current_location;
        $checkout->current_status = $req->current_status;
        $checkout->tracking_id = $req->tracking_id;

        $checkout->save();
        return redirect('status/dispatch')->with('success', 'Item dispatched');
    }
}
