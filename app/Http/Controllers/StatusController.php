<?php

namespace App\Http\Controllers;

use App\Models\Update;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StatusController extends Controller
{
    public function index()
    {
        $checkout = Checkout::latest()->filter(request(['search']))->orderBy('id', 'desc')->paginate(10)->withQueryString();

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

    public function receive(Request $req)
    {
        $checkout = Checkout::latest()->orderBy('id', 'desc')->paginate(10);
        $location = User::where('id', '=', $req->user()->id)->latest();

        return view('receive-item-status-update', [
            'checkouts' => $checkout,
            'locations' => $location->get()
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

        $existingTimeline = $checkout->timeline_data ? json_decode($checkout->timeline_data, true) : [];
        $newLocationData = [
            'status' => $req->current_status,
            'location' => $req->current_location,
            'time' => now()->toDateTimeString()
        ];
        $existingTimeline[] = $newLocationData;

        $checkout->timeline_data = json_encode($existingTimeline);

        $checkout->save();
        return redirect('status/receive')->with('success', 'Item received');
    }

    public function dispatch(Request $req)
    {
        $checkout = Checkout::latest()->orderBy('id', 'desc')->paginate(10);
        $location = User::where('id', '=', $req->user()->id)->latest();

        return view('dispatch-item-status-update', [
            'checkouts' => $checkout,
            'locations' => $location->get()
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

        $existingTimeline = $checkout->timeline_data ? json_decode($checkout->timeline_data, true) : [];
        $newLocationData = [
            'status' => $req->current_status,
            'location' => $req->current_location,
            'time' => now()->toDateTimeString()
        ];
        $existingTimeline[] = $newLocationData;

        $checkout->timeline_data = json_encode($existingTimeline);

        $checkout->save();
        return redirect('status/dispatch')->with('success', 'Item dispatched');
    }
}
