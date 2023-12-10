<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(Request $req)
    {
        $checkout = Checkout::all();

        return view('order', [
            'checkouts' => $checkout->where('user_id', '=', $req->user()->id)
        ]);
    }
}
