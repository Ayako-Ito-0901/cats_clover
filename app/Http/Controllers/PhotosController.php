<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat; // Cats情報の取得
use Storage; // 画像アップで追加してみた
use App\Photo;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;

class PhotosController extends Controller
{
    // ユーザーページで猫の写真一覧を取得する処理
    public function userphotoindex($userid, $catid) {
        $data = [];
        if (\Auth::check()) {
            $cat = Cat::find($catid);
            $user = User::find($userid);
            $photos = $cat->photos()->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20);
            
            $data = [
                'cat' => $cat,
                'user' => $user,
                'photos' => $photos,
                
                ];
        }
        //他のユーザーidを手入力してアクセスした時の処理。トップにリダイレクト
        if ($user->id == \Auth::user()->id) {
        
        return view('auth.usercatsphoto', $data);
        
        }
        
        else {
            $cats = Cat::where('status', '募集中')->paginate(20);
        
            return view('index', ['cats' => $cats,]);
        }
    }
    
    // adminのphotoページでユーザーからの写真一覧を表示する機能
    public function adminphotoindex() {
        $photos = Photo::whereNotNull('user_id')->orderBy('created_at', 'desc')->paginate(30);
        $users = User::all();
        $cats = Cat::all();
        
        return view('admin.photo', [
            'photos' => $photos,
            'users' => $users,
            'cats' => $cats
            ]);
    }
    
    
    
    public function userphotostore(Request $request, $userid, $catid) {
        // バリデーション
        $this->validate($request, [
            'image_path' => 'required',
            'comment' => 'required',
            //'cat_id' => 'required',
            ]);
        
        // バリデーションEnd
        
        $photo = new Photo;
        
        // 画像をリサイズ
        $file = $request->file('image_path');
        // 画像の拡張子を取得
        $extension = $request->file('image_path')->getClientOriginalExtension();
        // 画像の名前を取得
        $filename = $request->file('image_path')->getClientOriginalName();
        $timestamp = time();
        $filename = $timestamp . $filename;
        // 画像をリサイズ変更したところ
        $width = 500;
        $resize_img = Image::make($file)->resize($width, null, function($constraint){
            $constraint->aspectRatio();
        });
    
        // s3のuploadsファイルに追加 これがだめ！boolean値が返される
        $path = Storage::disk('s3')->put('/myprefix/'.$filename, $resize_img->stream()->__toString(), 'public');
        // 画像のURLを参照
        $url = Storage::disk('s3')->url('myprefix/'.$filename);
        //dd($url);
        
        $photo->image_path = $url;
        
        $photo->comment = $request->comment;
        $photo->cat_id = $catid;
        $photo->user_id = $request->user()->id;
        
        //$photo->user_id = $userid;
        
        $photo->save();
        
        return back();
   
    }
    
    public function adminphotostore(Request $request, $catid) {
        // バリデーション
        $this->validate($request, [
            'image_path' => 'required',
            'comment' => 'required',
            ]);
        
        // バリデーションEnd
        
        $photo = new Photo;
        
        // 画像をリサイズ
        $file = $request->file('image_path');
        // 画像の拡張子を取得
        $extension = $request->file('image_path')->getClientOriginalExtension();
        // 画像の名前を取得
        $filename = $request->file('image_path')->getClientOriginalName();
        $timestamp = time();
        $filename = $timestamp . $filename;
        // 画像をリサイズ変更したところ
        $width = 500;
        $resize_img = Image::make($file)->resize($width, null, function($constraint){
            $constraint->aspectRatio();
        });
    
        // s3のuploadsファイルに追加 これがだめ！boolean値が返される
        $path = Storage::disk('s3')->put('/myprefix/'.$filename, $resize_img->stream()->__toString(), 'public');
        // 画像のURLを参照
        $url = Storage::disk('s3')->url('myprefix/'.$filename);
        //dd($url);
        
        $photo->image_path = $url;
        
        $photo->comment = $request->comment;
        $photo->cat_id = $catid;
        
        $photo->save();
        
        return back();
   
    }

    
    public function userphotodestroy($photoid) {
        $photo = Photo::find($photoid);
        //dd($photo);
        $photo->delete();
        
        return back();
    }
    
    public function adminphotodestroy($photoid) {
        $photo = Photo::find($photoid);
        //dd($photo);
        $photo->delete();
        
        return back();
    }
    
    
    public function adminphotoedit($photoid) {
        $photo = Photo::find($photoid);
        $user = User::find($photo->user_id);
        $cat = Cat::find($photo->cat_id);
        
        $data = [
                'cat' => $cat,
                'user' => $user,
                'photo' => $photo,
                
                ];
        
        return view('admin.photoedit', $data);
        
    }
    
    public function adminphotoupdate(Request $request, $photoid) {
        $photo = Photo::find($photoid);
        $photo->reply = $request->reply;
        
        $photo->save();
        
        return redirect()->action('PhotosController@adminphotoindex');
    }
    
    
    
}
