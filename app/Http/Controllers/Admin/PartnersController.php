<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Partner::all();
        return view('admin.partner.index',[
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
        $item = new Partner();
        return view('admin.partner.create',[
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
        $item = new Partner;
        $item->title = $request->title;
        $item->link = $request->link;
        $item->image = $this->uploadPublic($request,'partners') ?? '';
        $item->lang = $request->lang;
        if ($item ->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Partner $partner)
    {
        $item = Partner::find($id);
        return view('admin.partner.create',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Partner $partner)
    {
        $item = Partner::find($id);
        $item->title = $request->title;
        $item->link = $request->link;
        $item->lang = $request->lang;
        if($request->has('file')) {
           $item->image = $this->upload($request,'partners') ?? $request->old_image;
        }

        if ($item->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $item = Partner::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
