<?php

namespace App\Http\Controllers;

use App\Map\CityObject;
use Illuminate\Http\Request;
use App\Map\ObjectDetails;
class MapsController extends Controller
{
    public function view($id)
    {
        $object = ObjectDetails::where('object_id',$id)->where('lang',app()->getLocale())->first();
        $city = CityObject::where('id',$id)->where('lang',app()->getLocale())->first();
         if(empty($object))
            return redirect()->to('/404');
        return view('front.map_view',[
            'maps'=>$object,
            'city'=>$city
        ]);
    }
}
