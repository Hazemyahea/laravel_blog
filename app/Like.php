<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'post_id','like'
    ];


    // Relation

    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }
}
