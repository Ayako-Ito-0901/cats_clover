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
        $cats = Cat::all();
        
        return view('admin.member', [
            'users' => $users,
            'cats' => $cats,
        ]);
    }
    
    public function show($id) {
        $user = User::find($id);
        $applyings = $user->applyings()->get();
        $cats = Cat::all()->where('user_id', $id);
        $data = [
            'user' => $user,
            'applyings' => $applyings,
            'cats' => $cats,
            ];
        
        //return view('admin.membershow', ['user' => $user,]);
        return view('admin.membershow', $data);
    }
    
    public function applyings($id) {
        $user = User::find($id);
        $applyings = $user->applyings()->get();
        $favoritecats = $user->favoritecats()->paginate(20);
        $data = [
            'user' => $user,
            'applyings' => $applyings,
            'favoritecats' => $favoritecats,
            ];
      
        return view('auth.applyings', $data);
    }
    
}