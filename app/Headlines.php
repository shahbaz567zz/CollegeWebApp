<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headlines extends Model
{
    protected $fillable = [
        'category',
        'body',
        'link',
    ];
}
