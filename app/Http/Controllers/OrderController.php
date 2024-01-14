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

        $checkout->delete();

        return back()->with('success', 'Order has been deleted');
    }

    public function restore($id)
    {
        $order = Checkout::withTrashed()->find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        } elseif (!is_null($order)) {
            $order->restore();
        }

        return back()->with('success', 'Order has been restored');
    }

    public function delete($id)
    {
        $order = Checkout::withTrashed()->find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        } elseif (!is_null($order)) {
            $order->forceDelete();
        }

        return back()->with('success', 'Order has been permanently deleted');
    }
}
