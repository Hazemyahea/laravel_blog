<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'photo','category_id','user_id'
    ];


    // Relations

    public function user () {
        return $this->belongsTo('App\User','user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function comments () {
        return $this->hasMany('App\Comment','post_id');
    }

    public function likes () {
        return $this->hasMany('App\Like','post_id');
    }
}
