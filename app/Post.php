<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    public $timestamps = false;
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo('App\User');
        // "$this (App\Post) 는 App\User 에 속한다" 라는 의미?
    }
}
