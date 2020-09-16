<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;
class FaqsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Faq::all();
        return view('admin.faq.index',[
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
        $item = new Faq();
        return view('admin.faq.create',[
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
        $item = new Faq;
        $item->title = $request->title;
        $item->text = $request->text;
        $item->lang = $request->lang;
        if ($item ->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    public function edit($id,Faq $faq)
    {
        $item = Faq::find($id);
        return view('admin.faq.create',[
            'item'=>$item
        ]);
    }

    public function update($id,Request $request, Faq $faq)
    {
        $item = Faq::find($id);
        $item->title = $request->title;
        $item->text = $request->text;
        $item->lang = $request->lang;
       

        if ($item->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $item = Faq::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
