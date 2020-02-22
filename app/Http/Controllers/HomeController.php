<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat; // Cats情報の取得
use Storage; // 画像アップで追加してみた


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
     /*試しにこちらをコメントアウトしてみる
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cats = Cat::orderBy('id', 'desc')->paginate(20);
        $cats = Cat::where('status', '募集中')->paginate(20);
        
        return view('index', ['cats' => $cats,]);
    }
    
    public function show($id) {
        $cat = Cat::find($id);
        
        return view('usercatshow', [
            'cat' => $cat,
            ]);
    }
    
}


