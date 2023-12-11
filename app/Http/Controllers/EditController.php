<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Statse;
use Illuminate\Http\Request;

class EditController extends Controller
{
    function show($id)
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c' && auth()->user()->email !== 'j@d.c') {
            abort(403);
        }

        $checkout = Checkout::find($id);
        $stats = Statse::all();

        return view('edit', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }
    function update(Request $req)
    {
        $update = Checkout::find($req->id);
        $update->current_status = $req->current_status;
        $update->save();
        return redirect('admin');
    }
}
