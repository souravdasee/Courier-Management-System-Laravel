<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
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

    public function show($id)
    {
        $checkout = Checkout::find($id);

        return view('orderdetails', [
            'checkouts' => $checkout
        ]);
    }
}
