<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    const ABOUT = 1;
    const CHARTER = 2;

    public static function page($page)
    {
        return self::where('page',$page);
    }
}
