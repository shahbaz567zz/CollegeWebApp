<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeCommentReply extends Model
{
    protected $fillable = [
        'is_active',
        'author',
        'email',
        'body',
        'user_id',
        'college_comment_id'
    ];

    public function comment(){
        return $this->belongsTo('App\CollegeComment','college_comment_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
