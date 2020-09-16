<?php

namespace App\Http\Controllers;

use App\About;
use App\Map\City;
use App\Map\CityObject;
use App\Map\Region;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::page(About::ABOUT);
    }

    public function charter()
    {
        $charter = About::page(About::CHARTER);
    }

    public function map()
    {
        $city = CityObject::where('lang',app()->getLocale())->get();
      
        return view('front.home');
    }
}
