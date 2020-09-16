<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function faq($lang = null)
    {
        $items = Faq::where('lang',app()->getLocale())->get();
        dd($items);
        return view('front.faq',[
            'items'=>$items
        ]);
    }

    public function add(Request $request)
    {
        $faq = new FAQ;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
    }

    public function update(Request $request)
    {
        $faq = FAQ::find($request->id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
    }
    public function remove($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
    }
}
