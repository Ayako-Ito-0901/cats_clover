<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat; // Cats情報の取得
use Storage; // 画像アップで追加してみた
use App\User;
use Intervention\Image\ImageManagerStatic as Image;


class CatsController extends Controller
{
    
    public function index()
    {
        $cats = Cat::orderBy('id', 'desc')->paginate(20);
        
        return view('admin.cats', ['cats' => $cats,]);
    }
    
    
    public function create() {
        $cat = new Cat;

        return view ('admin.catcreate', ['cat' => $cat,]);
    }
    
    
    
    // message-boardを参考にした、create使っていないバージョン
    public function store(Request $request) {
        
        // バリデーション |区切りで入れていく
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'catch_copy' => 'required|max:50',
            'feature' => 'required',
            'status' => 'required',
            ]);
        
        // バリデーションEnd
        
        $cat = new Cat;
    
        // 画像をリサイズ
        $file = $request->file('mainimage_path');
        // 画像の拡張子を取得
        $extension = $request->file('mainimage_path')->getClientOriginalExtension();
        // 画像の名前を取得
        $filename = $request->file('mainimage_path')->getClientOriginalName();
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
        
        $cat->mainimage_path = $url;
        

        // 画像パス以外を格納
        $cat->name = $request->name;
        $cat->age = $request->age;
        
        // configから取得
        //$gender = config('temp.catsgender');
        //$cat->gender = $gender[$request->gender];
        $cat->gender = $request->gender;
        
        $cat->catch_copy = $request->catch_copy;
        $cat->feature = $request->feature;
        
        // configから取得
        $status = config('temp.status');
        $cat->status = $status[$request->status];
        
        $cat->memo = $request->memo;
        $cat->user_id = $request->user_id;
        
        $cat->save();

        return redirect()->action('CatsController@index');
      
    }
    
    
    /* twitterクローンを参考にした場合。createを使っている
    public function store(Request $request)
    {
        $this->validate($request, [
        'content' => 'required|max:191',
        ]);

        $request->cat()->cats()->create([
        'content' => $request->content,
        ]);

        return back();
    }
    */
    
    public function show($id) {
        $cat = Cat::find($id);
        $applied = $cat->applied()->get();
        //dd($applied);
        
        $data = [
            'cat' => $cat,
            'applieds' => $applied,
        ];
        
        return view('admin.catshow', $data);
        
        /*
        return view('admin.catshow')->with([
           "cat" => $cat,
           "data" => $data
           ]);
           */
    }
    
    
    public function edit($id) {
        $cat = Cat::find($id);
        $applied = $cat->applied()->get();
        //dd($applied);
        
        $data = [
            'cat' => $cat,
            'applieds' => $applied,
        ];
        
        return view('admin.catedit', $data);

        
    }
    
    
    public function update(Request $request, $id) {
        
        // バリデーション |区切りで入れていく
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'catch_copy' => 'required|max:50',
            'feature' => 'required',
            'status' => 'required',
            ]);
        
        // バリデーションEnd
        
        
        $cat = Cat::find($id);
        /*
        // s3アップロード開始
        $image = $request->file('mainimage_path');
        
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('/myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $cat->mainimage_path = Storage::disk('s3')->url($path);
       */
       
       
       
       // 画像がアップロードされたら保存する
       if ($request->mainimage_path) {
       
       // 画像をリサイズ
        $file = $request->file('mainimage_path');
        // 画像の拡張子を取得
        $extension = $request->file('mainimage_path')->getClientOriginalExtension();
        // 画像の名前を取得
        $filename = $request->file('mainimage_path')->getClientOriginalName();
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
        
        $cat->mainimage_path = $url;
       }
        
        // 画像パス以外を格納
        $cat->name = $request->name;
        $cat->age = $request->age;
        
        // configから取得
        //$gender = config('temp.catsgender');
        //$cat->gender = $gender[$request->gender];
        $cat->gender = $request->gender;
        
        $cat->catch_copy = $request->catch_copy;
        $cat->feature = $request->feature;
        
        // configから取得
        $status = config('temp.status');
        $cat->status = $status[$request->status];
        
        $cat->memo = $request->memo;
        $cat->user_id = $request->user_id;
        
        $cat->save();

        return redirect()->action('CatsController@index');
    
    }
    
    
    public function destroy($id) {
        $cat = Cat::find($id);
        $cat->delete();

        return redirect()->action('CatsController@index');

    }
    
    
}
