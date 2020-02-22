<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'catch_copy', 'feature', 'status', 'user_id', 'mainimage_path', 'memo'];

    // 申込をしたユーザーを取得したいのでここに追加したけど合っているか…
    public function applied() {
        return $this->belongsToMany(User::class, 'user_cat', 'cat_id', 'user_id')->withTimestamps();
    }
    
    
}




