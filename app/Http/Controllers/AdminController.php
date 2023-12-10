<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c') {
            abort(403);
        }

        $checkout = Checkout::all();

        return view('admin', [
            'checkouts' => $checkout
        ]);
    }
}
