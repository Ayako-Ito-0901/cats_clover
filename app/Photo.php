<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['cat_id', 'image_path', 'comment', 'user_id'];
    
    //これいらないかも？
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
}
