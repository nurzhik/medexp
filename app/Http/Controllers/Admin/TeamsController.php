<?php

namespace App\Http\Controllers\Admin;
use App\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Illuminate\Support\Facades\File;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Team::all();
        return view('admin.team.index',[
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
        $item = new Team();
        return view('admin.team.create',[
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
        $item = new Team;
        $item->name = $request->name;
        $item->position = $request->position;
        $item->text = $request->text;
        $item->type_id = $request->type_id;
        $item->image = $this->uploadPublic($request,'teams') ?? '';
        $item->lang = $request->lang;
        if ($item ->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    public function edit($id,Team $team)
    {
        $item = Team::find($id);
        return view('admin.team.create',[
            'item'=>$item
        ]);
    }

    public function update($id,Request $request, Team $team)
    {
        $item = Team::find($id);
        $item->name = $request->name;
        $item->position = $request->position;
        $item->text = $request->text;
        $item->type_id = $request->type_id;
        $item->lang = $request->lang;
        if($request->has('file')) {
           $item->image = $this->uploadPublic($request,'teams') ?? '';
       }
        if ($item->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $item = Team::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
