<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeComment extends Model
{
    protected $fillable = [
        'college_id',
        'is_active',
        'author',
        'email',
        'body',
        'user_id'
    ];

    public function college(){
        return $this->belongsTo('App\College');
    }

    public function replies(){
        return $this->hasMany('App\CollegeCommentReply');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
