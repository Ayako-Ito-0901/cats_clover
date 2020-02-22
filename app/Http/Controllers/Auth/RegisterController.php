<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // カラム追加したので追加　passまであった
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
            'year' => 'required|integer',
            'month' => 'required|integer|max:12',
            'day' => 'required|integer|max:31',
            
            'family_of' =>'required|integer',
            'post_address' => 'required|integer',
            'prefecture' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // カラム追加したので追加してみた passまであった
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            
            $data['month'] = sprintf('%02d',  $data['month']),
            $data['day'] = sprintf('%02d',  $data['day']),
            
            'birth' => $data['year'].$data['month'].$data['day'],
            
            'family_of' => $data['family_of'],
            'post_address' => $data['post_address'],
            
            // 県をconfigから取得
            $prefecture = config('temp.pref'),
            'prefecture' => $prefecture[$data['prefecture']],
            
            'address' => $data['address']
        ]);
    }
}
