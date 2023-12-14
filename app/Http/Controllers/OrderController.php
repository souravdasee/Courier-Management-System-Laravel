<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(Request $req)
    {
        $checkout = Checkout::orderBy('id', 'desc')->get();

        return view('order', [
            'checkouts' => $checkout->where('users_id', '=', $req->user()->id)
        ]);
    }
}
