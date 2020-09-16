<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table = 'expertise';

    public static function parentId(int $id)
    {
        return self::where('parent_id',$id);
    }

    public function expertiseList($id)
    {
        return self::where('parent_id',$id)->get();
    }
}
