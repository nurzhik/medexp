<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;
use DB;
class CityObject extends Model
{
    protected $table = 'city_objects';

    public static function remove($id)
    {
        $self = self::find($id);
        if ($self) {
            ObjectDetails::where('object_id',$self->id)->delete();
            $self->delete();
            return true;
        }
        return false;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cities($id,$lang = 'ru')
    {
        return DB::table('city_objects')
                ->join('map_city','city_objects.city_id','=','map_city.id')
                ->join('map_region','map_city.region_id','=','map_region.id')
                ->select('city_objects.id','city_objects.lang','city_objects.name','city_objects.address','map_city.name as city_name'
                ,'map_region.name as region_name')
                ->where(['map_region.keys'=>$id,'city_objects.lang'=>$lang])->get();
    }

    public function details()
    {
        return $this->belongsTo(ObjectDetails::class,'id','object_id');
    }
}
