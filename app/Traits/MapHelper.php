<?php


namespace App\Traits;


use App\Map\City;
use App\Map\CityObject;
use App\Map\ObjectDetails;
use App\Map\Region;

trait MapHelper
{
    public function mapHandle($request)
    {
        switch ($request->type) {
            case 1:
                $region = new Region;
                $region->name = $request->name;
                $region->keys = $request->keys;
                if ($region->save()) {
                    return true;
                }

            break;
            case 2:
                $city = new City;
                $city->name = $request->name;
                $city->region_id = $request->region_id;
                if ($city->save()) {
                    return true;
                }
            break;
            case 3:
                $cityObject = new CityObject;
                $cityObject->name = $request->name;
                $cityObject->city_id = $request->city_id;
                $cityObject->address = $request->address;
                 $cityObject->lang = $request->lang;
                if ($cityObject->save()) {
                    return true;
                }
            break;
            case 4:
                $cityObject = new ObjectDetails;
                $cityObject->object_id = $request->object_id;
                $cityObject->position = $request->position;
                $cityObject->fio = $request->fio;
                $cityObject->contacts = $request->contacts;
                $cityObject->date_priem = $request->date_priem;

                if ($cityObject->save()) {
                    return true;
                }
            break;
        }
        return false;
    }

    public function mapUpdateHandle($request)
    {
        switch ($request->type) {
            case 1:
                $region = Region::find($request->id);
                $region->name = $request->name;
                if ($region->save()) {
                    return true;
                }

                break;
            case 2:
                $city =  City::find($request->id);
                $city->name = $request->name;
                $city->region_id = $request->region_id;
                if ($city->save()) {
                    return true;
                }
                break;
            case 3:
                $cityObject = CityObject::find($request->id);
                $cityObject->name = $request->name;
                $cityObject->city_id = $request->city_id;
                $cityObject->address = $request->address;
                $cityObject->lang = $request->lang;
                if ($cityObject->save()) {
                    return true;
                }
                break;
            case 4:
                $cityObject =  ObjectDetails::find($request->id);
                $cityObject->object_id = $request->object_id;
                $cityObject->position = $request->position;
                $cityObject->fio = $request->fio;
                $cityObject->contacts = $request->contacts;
                $cityObject->date_priem = $request->date_priem;

                if ($cityObject->save()) {
                    return true;
                }
                break;
        }
        return false;
    }
}
