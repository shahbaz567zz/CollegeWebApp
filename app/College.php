<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable =[
        'name',
        'body',
        'is_govt',
        'is_central',
        'is_active',
        'region_id',
        'category_id',
        'photo_id'
    ];

    public function region(){
        return $this->belongsTo('App\Collegeregion','region_id');
    }

    public function categories(){
        return $this->belongsToMany('App\Collegecategory','college_category');
    }

    public function photo(){
        return $this->belongsTo('App\Photo','photo_id');
    }
}
