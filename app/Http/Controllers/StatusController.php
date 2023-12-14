<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function index()
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c' && auth()->user()->email !== 'j@d.c') {
            abort(403);
        }

        $checkout = Checkout::orderBy('id', 'desc')->paginate(10);

        return view('status', [
            'checkouts' => $checkout
        ]);
    }
}
