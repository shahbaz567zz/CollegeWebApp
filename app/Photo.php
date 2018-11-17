<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $imgPath = '/images/';
    protected $fillable = ['file'];
    
    public function getFileAttribute($photo){
        return $this->imgPath . $photo;
    }
}
