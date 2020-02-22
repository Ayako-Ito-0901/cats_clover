<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// コメントアウトする
// Route::get('/', function () {
//     return view('/');
// });

Auth::routes();

// ユーザー認証不要

//Route::get('/', function () { return view('home'); });
Route::get('/', 'HomeController@index')->name('home');
Route::get('cat/{id}', 'HomeController@show')->name('usercatshow');

// ユーザー登録　認証不要
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');




    
 
    
// Userログイン後 ここにログイン認証が必要な処理を入れる
Route::group(['middleware' => 'auth:user'], function() {
    
 //   Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/', function () { return view('index'); });
    
    // 申込機能で追加
    Route::group(['prefix' => 'cats/{id}'], function() {
        Route::post('apply', 'UserApplyController@store')->name('user.apply');
        Route::delete('unapply', 'UserApplyController@destroy')->name('user.unapply');
        
        Route::get('applied', 'CatsController@applied')->name('cats.applied');
    });
    
    // 申込機能で追加
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('applyings', 'UsersController@applyings')->name('user.applyings');
    });
    
});    
    


// Admin認証不要
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});


// Adminログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/member', 'UsersController@index')->name('member.index');
    Route::get('/member/{id}', 'UsersController@show')->name('member.show');
    
    // cats登録関連 基本のやつ
    Route::resource('cats', 'CatsController');
    
    // 申込機能で追加 追加していいものか・・・
    //Route::group(['prefix' => 'cats/{id}'], function() {
    //    Route::get('applied', 'CatsController@applied')->name('cats.applied');
    //});
    
});






/*
// ユーザー認証不要 cat.showを追加すること★
Route::get('/', function() { return redirect('/');});


// ユーザー登録　認証不要
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザー機能。ログイン後できる
Route::group(['middleware' => 'auth:user'], function() {
    // 自分のページのget
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    Route::group(['prefix' => 'users/{id}'], function() {
       Route::get(['applies', 'UsersController@applies'])->name('user.applies');
       Route::get(['trials', 'UsersController@trials'])->name('user.trials');
       Route::get(['families', 'UsersController@families'])->name('user.families');
    });
    
    
    Route::group(['prefix' => 'cats/{id}'], function() {
        // 申込するところ
       Route::post('apply', 'UserApplyController@store')->name('cat.apply');
       Route::delete('unapply', 'UserApplyController@destroy')->name('cat.unapply');
       // ver2の写真の部分
       Route::post('photo', 'UserPhotoController@store')->name('cat.photoup');
       Route::delete('photodelete', 'UserPhotoController@destroy')->name('cat.phptodel');
       
    });
    
});



// Admin認証不要
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

// Adminログイン後 まだ途中一旦先に進む。後で追加する事★
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});
    
*/    
    

