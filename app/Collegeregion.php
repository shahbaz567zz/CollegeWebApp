<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collegeregion extends Model
{
    protected $fillable = [
        'name'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
