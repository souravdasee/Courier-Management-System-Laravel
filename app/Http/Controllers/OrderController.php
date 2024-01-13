<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\ArchiveOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(Request $req)
    {
        $checkout = Checkout::where('users_id', '=', $req->user()->id)->latest()->filter(request(['search']))->paginate(10)->withQueryString();

        return view('order', [
            'checkouts' => $checkout
        ]);
    }

    public function show($id, Request $req)
    {
        $checkout = Checkout::where('users_id', '=', $req->user()->id)->findOrFail($id)->latest()->first();

        return view('orderdetails', [
            'checkouts' => $checkout
        ]);
    }

    public function destroy($id)
    {
        $checkout = Checkout::find($id);

        if (!$checkout) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $archivedOrder = new ArchiveOrder();

        $archivedOrder->checkout_id = $checkout->id;
        $archivedOrder->users_id = $checkout->users_id;
        $archivedOrder->role = $checkout->role;
        $archivedOrder->users_name = $checkout->users_name;
        $archivedOrder->sender_name = $checkout->sender_name;
        $archivedOrder->recipient_name = $checkout->recipient_name;
        $archivedOrder->sender_number = $checkout->sender_number;
        $archivedOrder->recipient_number = $checkout->recipient_number;
        $archivedOrder->from = $checkout->from;
        $archivedOrder->to = $checkout->to;
        $archivedOrder->sender_address = $checkout->sender_address;
        $archivedOrder->recipient_address = $checkout->recipient_address;
        $archivedOrder->distance = $checkout->distance;
        $archivedOrder->weight = $checkout->weight;
        $archivedOrder->parcel_amounts = $checkout->parcel_amounts;
        $archivedOrder->payment_method = $checkout->payment_method;
        $archivedOrder->payment_status = $checkout->payment_status;
        $archivedOrder->tracking_id = $checkout->tracking_id;
        $archivedOrder->current_location = $checkout->current_location;
        $archivedOrder->current_status = $checkout->current_status;
        $archivedOrder->remarks = $checkout->remarks;
        $archivedOrder->image = $checkout->image;
        $archivedOrder->voice = $checkout->voice;
        $archivedOrder->checkout_created_at = $checkout->created_at;
        $archivedOrder->checkout_updated_at = $checkout->updated_at;
        $archivedOrder->save();

        $checkout->delete();
        return back()->with('success', 'Order has been deleted');
    }
}
