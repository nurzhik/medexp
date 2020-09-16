<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vacancies = Vacancy::all();
        return view('admin.vacancies.index',[
            'vacancies'=>$vacancies
        ]);

    }
    public function create()
    {
        $vacancies = new Vacancy();
        return view('admin.vacancies.create',[
            'vacancies'=>$vacancies
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "text" => "required",
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with(['errors' => $validator->errors()]);
        }
        $item = new Vacancy();
        $item->text = $request->text;
        $item->region_id = $request->region_id;
        if ($item->save()) {
            return redirect()->back()->with('success','Новая запись успешно создана!');
        }
        return redirect()->back()->with('error','Повторите еще раз');

    }
    public function edit($id)
    {
        $item = Vacancy::find($id);
        return view('admin.vacancies.edit',[
            'item' => $item,
        ]);
    }

  
    public function update(Request $request,$id)
    {
        //
        $item = Vacancy::find($id);
        $item->text = $request->text;
        $item->region_id = $request->region_id;
        if ($item->save()) {
            return redirect()->back()->with('success','Новая запись успешно создана!');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

   
    public function delete($id)
    {   
        $item = Vacancy::find($id);
       
        if ( $item->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }
}
