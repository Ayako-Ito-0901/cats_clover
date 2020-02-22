<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserApplyController extends Controller
{
     public function store(Request $request, $id)
    {
        \Auth::user()->apply($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unapply($id);
        return back();
    }
}
