<?php

namespace App\Http\Controllers\Admin; // Adminを追加

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // これを追加

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // admin追加
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home'); // adminを追加
    }
}
