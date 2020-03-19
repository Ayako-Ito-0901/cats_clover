<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // ユーザー情報の取得
use App\Cat; // cat情報の取得

class UserFavoriteController extends Controller
{
    public function store(Request $request, $id) {
        \Auth::user()->favorite($id);
        return back();
    }
    
    public function destroy(Request $request, $id) {
        \Auth::user()->unfavorite($id);
        return back();
    }
}
