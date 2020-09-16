<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestForm;
use App\StaticPage;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Illuminate\Support\Facades\File;

class StaticPageController extends Controller
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
        $staticpage = StaticPage::all();
        return view('admin.staticpage.index',[
            'staticpage'=>$staticpage
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staticpage = new StaticPage();
        return view('admin.staticpage.create',[
            'staticpage'=>$staticpage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestForm $request)
    {
        //

        $staticpage = new StaticPage;
        $staticpage->title = $request->title;
        $staticpage->slug = $request->slug;
        $staticpage->type_id = $request->type_id;
        $staticpage->image = $this->uploadPublic($request,'staticpage') ?? '';
        $staticpage->text = $request->text;
         $staticpage->lang = $request->lang;
        if ($staticpage->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticPage $staticPage,$id)
    {
        $item = StaticPage::find($id);
        return view('admin.staticpage.edit',[
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function update($id,RequestForm $request)
    {
        $staticpage = StaticPage::find($id);
        $staticpage->title = $request->title;
        $staticpage->slug = $request->slug;
         $staticpage->type_id = $request->type_id;
          $staticpage->lang = $request->lang;
        if($request->has('file')) {
           $staticpage->image = $this->upload($request,'staticpage') ?? $request->old_image;
        }
        $staticpage->text = $request->text;

        if ($staticpage->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $item = StaticPage::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
