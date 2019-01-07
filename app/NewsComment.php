<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $fillable = [
        'news_id',
        'is_active',
        'author',
        'email',
        'body',
        'user_id'
    ];

    public function news(){
        return $this->belongsTo('App\News');
    }

    public function replies(){
        return $this->hasMany('App\NewsCommentReply');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
