<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GosService extends Model
{
    protected $table = 'gosservices';


    public static function parentId(int $id)
    {
        return self::where('parent_id',$id);
    }


    public function list($id)
    {
        return self::where('parent_id',$id)->get();
    }
}
