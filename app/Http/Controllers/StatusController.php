<?php

namespace App\Http\Controllers;

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
}
