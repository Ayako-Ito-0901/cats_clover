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
    
    // 写真機能で追加 ユーザーの猫の写真一覧を表示
    Route::group(['prefix' => 'users/{userid}'], function() {
        Route::get('photos/{catid}', 'PhotosController@userphotoindex')->name('user.photoindex');
        Route::post('photos/{catid}', 'PhotosController@userphotostore')->name('user.photostore');
        
    });
    
    Route::delete('photos/{id}', 'PhotosController@userphotodestroy')->name('user.photodestroy');
    
    // お気に入り登録機能で追加
    Route::group(['prefix' => 'users/{id}'], function() {
       Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
       Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
       //Route::get('favoritecats', 'UsersController@favoritecats')->name('user.favoritecats'); //これいらないかも
   
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
    
    //photo機能で追加
    Route::get('/photo', 'PhotosController@adminphotoindex')->name('admin.photoindex');
    Route::post('/cats/{catid}', 'PhotosController@adminphotostore')->name('admin.photostore');
    Route::delete('photos/{id}', 'PhotosController@adminphotodestroy')->name('admin.photodestroy');
    Route::get('photos/{id}', 'PhotosController@adminphotoedit')->name('admin.photoedit');
    Route::put('photos/{id}', 'PhotosController@adminphotoupdate')->name('admin.photoupdate');
    // 写真検索で追加
    //Route::get('/photo', 'PhotosController@adminphotosearch')->name('admin.serachphotoindex');
    
    // 申込機能で追加 追加していいものか・・・
    //Route::group(['prefix' => 'cats/{id}'], function() {
    //    Route::get('applied', 'CatsController@applied')->name('cats.applied');
    //});
    
});








