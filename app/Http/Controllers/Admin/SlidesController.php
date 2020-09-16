<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Slide::all();
        return view('admin.slide.index',[
            'items'=>$items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Slide();
        return view('admin.slide.create',[
            'item'=>$item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Slide;
        $item->type_id = $request->type_id;
        $item->image = $this->uploadPublic($request,'slides') ?? '';
        if ($item ->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    public function edit($id,Slide $slide)
    {
        $item = Slide::find($id);
        return view('admin.slide.create',[
            'item'=>$item
        ]);
    }

    public function update($id,Request $request, Slide $slide)
    {
        $item = Slide::find($id);
        $item->type_id = $request->type_id;
        if($request->has('file')) {
           $item->image = $this->upload($request,'slides') ?? $request->old_image;
        }

        if ($item->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $item = Slide::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
