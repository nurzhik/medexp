<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    //
    protected $fillable = [
        'title','image','text'
    ];
}
