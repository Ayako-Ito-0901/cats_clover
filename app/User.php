<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth', 'family_of', 'post_address', 'prefecture', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // 申込機能で記載
    public function applyings() {
        return $this->belongsToMany(Cat::class, 'user_cat', 'user_id', 'cat_id')->withTimestamps();
    }
    
    public function is_apply($catId) {
        return $this->applyings()->where('cat_id', $catId)->exists();
    }
    
    // 申込、申込キャンセルを定義
    
    public function apply($catId) {
        // 既に申し込んでいるかの確認
        $exist = $this->is_apply($catId);
        
        if ($exist) {
            // 既に申し込んでいれば何もしない
            return false;
        }
        else {
            // 申込していなければ申し込む
            $this->applyings()->attach($catId);
            return true;
        }
    }
    
    public function unapply($catId) {
        // 既に申し込んでいるかの確認
        $exist = $this->is_apply($catId);
        
        if ($exist) {
            // 既に申し込んでいたらキャンセルする
            $this->applyings()->detach($catId);
            return true;
        }
        else {
            // 未申込だったら何もしない
            return false;
        }
    }
    
    // お気に入り機能で追加
    public function favoritecats() {
        return $this->belongsToMany(Cat::class, 'favorite', 'user_id', 'cat_id')->withTimestamps();
    }
    
    // お気に入り登録
    public function favorite($catId) {
        $exist = $this->is_favorite($catId);
        
        if ($exist) {
            return false;
        }
        else {
            $this->favoritecats()->attach($catId);
            return true;
        }
    }
    
    // お気に入りを外す
    public function unfavorite($catId) {
        $exist = $this->is_favorite($catId);
        
        if ($exist) {
            $this->favoritecats()->detach($catId);
            return true;
        } 
        else {
            return false;
        }
    }
    
    public function is_favorite($catId) {
        return $this->favoritecats()->where('cat_id', $catId)->exists();
    }
    
    
}
