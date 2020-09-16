<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'map_city';

    public static function remove($id)
    {
        if (self::find($id)) {
            $cityObjects = CityObject::where('city_id',$id);
            if ($cityObjects->exists()) {
                foreach($cityObjects->get() as $item) {
                    ObjectDetails::where('object_id',$item->id)->delete();
                }
                $cityObjects->delete();
            }

            self::find($id)->delete();
            return true;
        }
        return false;
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
