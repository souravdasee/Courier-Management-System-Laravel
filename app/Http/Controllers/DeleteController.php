<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    function delete($id)
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->email !== 's@d.c') {
            abort(403);
        }

        $data = Checkout::find($id);
        $data->delete();
        return redirect('admin');
    }
}
