<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // ユーザー情報の取得
use App\Cat; // cat情報の取得


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        
        return view('admin.member', [
            'users' => $users,
        ]);
    }
    
    public function show($id) {
        $user = User::find($id);
        $applyings = $user->applyings()->get();
        $data = [
            'user' => $user,
            'applyings' => $applyings,
            ];
        
        //return view('admin.membershow', ['user' => $user,]);
        return view('admin.membershow')->with([
           "user" => $user,
           "data" => $data
           ]);
    }
    
    public function applyings($id) {
        $user = User::find($id);
        $applyings = $user->applyings()->get();
        $data = [
            'user' => $user,
            'applyings' => $applyings,
            ];
      
        return view('auth.applyings', $data);
    }
    
}