<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Twilio\Rest\Client;
use App\Models\Checkout;
use Illuminate\Http\Request;

class EditController extends Controller
{
    function show($id)
    {
        $checkout = Checkout::find($id);
        $stats = Update::all();

        return view('edit', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    function update(Request $req)
    {
        $update = Checkout::find($req->id);


        // SMS Service Provider
        // $sid = getenv("TWILIO_ACCOUNT_SID");
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $number_from = getenv("TWILIO_PHONE_NUMBER_FROM");
        // $number_to = getenv("TWILIO_PHONE_NUMBER_TO");
        // $twilio = new Client($sid, $token);

        // $twilio->messages
        //     ->create(
        //         $number_to,
        //         [
        //             "body" => "Your parcel order has been: $req->current_status",
        //             "from" => $number_from
        //         ]
        //     )->sid;

        request()->validate([
            'current_status' => 'required | string | max:255',
            'current_location' => 'required | string | max:255'
        ]);

        $update->current_status = $req->current_status;
        $update->current_location = $req->current_location;

        $update->save();

        return redirect('status')->with('success', 'Status updated');
    }
}
