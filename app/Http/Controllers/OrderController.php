<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(Request $req)
    {
        $checkout = Checkout::where('users_id', '=', $req->user()->id)->orderBy('id', 'desc')->Paginate(10);

        return view('order', [
            'checkouts' => $checkout
        ]);
    }
}
