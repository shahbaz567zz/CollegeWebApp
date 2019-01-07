<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCommentReply extends Model
{
    protected $fillable = [
        'is_active',
        'author',
        'email',
        'body',
        'user_id',
        'news_comment_id'
    ];

    public function comment(){
        return $this->belongsTo('App\NewsComment','news_comment_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
