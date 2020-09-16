<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Map\City;
use App\Map\CityObject;
use App\Map\ObjectDetails;
use App\Map\Region;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function regions()
    {
        $regions = Region::all();
        $find = Region::find(\request()->post_id ?? 0);
        return view('admin.map.regions',[
            'regions'=>$regions,
            'find'=>$find
        ]);
    }
    public function cities()
    {
        $city = City::all();
        $regions = Region::all();
        $find = City::find(\request()->post_id ?? 0);
        return view('admin.map.city',[
            'city'=>$city,
            'region'=>$regions,
            'find'=>$find
        ]);
    }

    public function objects()
    {
        $objects = CityObject::all();
        $city = City::all();
        $find = CityObject::find(\request()->post_id ?? 0);
        return view('admin.map.cityobjects',[
            'objects'=>$objects,
            'city'=>$city,
            'find'=>$find
        ]);
    }

    public function editRegions($id)
    {
        $region = Region::find($id);

        return view('admin.map.edit_region',[
            'region'=>$region
        ]);
    }

    public function editCity($id)
    {
        $city = City::find($id);

        return view('admin.map.edit_city',[
            'city'=>$city
        ]);
    }

    public function editObject($id)
    {
        $cityObject = CityObject::find($id);

        return view('admin.map.edit_city',[
            'cityObject'=>$cityObject
        ]);
    }

    public function addRegion(Request $request)
    {
        if ($this->mapHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function addCity(Request $request)
    {
        if ($this->mapHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function addObjects(Request $request)
    {
        if ($this->mapHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function updateRegion(Request $request)
    {
        if ($this->mapUpdateHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function updateCity(Request $request)
    {
        if ($this->mapUpdateHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function updateObjects(Request $request)
    {
        if ($this->mapUpdateHandle($request)) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function addDetailsObjects()
    {
        $objects = CityObject::all();
        $find = ObjectDetails::where('object_id',\request()->post_id ?? 0)->first();

        return view('admin.map.add-object_details',[
            'objects'=>$objects,
            'find'=>$find,
        ]);
    }

    public function postObjectDetails(Request $request)
    {
        $find = ObjectDetails::where('object_id',$request->city_object);
        if ($find->exists()) {
            $add = $find->first();
            $add->first_data = $request->text;
            $add->second_data = $request->text2;
            $add->object_id = $request->city_object;
            $add->lang = $request->lang;
            if ($add->save()) {
                return redirect()->back()->with('success','Успешно добавлено');
            }
        }else {
            $add = new ObjectDetails();
            $add->first_data = $request->text;
            $add->second_data = $request->text2;
            $add->object_id = $request->city_object;
            $add->lang = $request->lang;
            if ($add->save()) {
                return redirect()->back()->with('success','Успешно добавлено');
            }
        }

    }

    public function removeAll($id,$type)
    {
        switch ($type) {
            case 1:
                if (City::remove($id)) {
                    return redirect()->back();
                }
            break;
            case 2:
                if (CityObject::remove($id)) {
                    return redirect()->back();
                }
            break;
            case 3:
            break;
        }
    }


}
