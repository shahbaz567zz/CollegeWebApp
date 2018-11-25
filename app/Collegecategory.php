<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collegecategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function colleges(){
        return $this->belongsToMany('App\College','college_category');
    }
}
