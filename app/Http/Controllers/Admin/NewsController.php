<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\News;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $news = News::all();
        return view('admin.news.news',[
            'news'=>$news
        ]);
    }

    public function addNews()
    {
        return view('admin.news.add-news');
    }
    public function editNews($id)
    {
        $item = News::find($id);
        return view('admin.news.edit-news',[
            'item'=>$item
        ]);

    }
    public function postAddNews(NewsRequest $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->image = $this->uploadPublic($request,'news') ?? '';
        $news->text = $request->text;
        $news->lang = $request->lang;
        $news->date = $request->date;
        if ($news->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');

    }
    public function postUpdateNews($id, NewsRequest $request)
    {

        $news = News::find($id);
        $news->title = $request->title;

        if($request->has('file')) {
           $news->image = $this->uploadPublic($request,'news') ?? '';
        }
        $news->text = $request->text;
        $news->lang = $request->lang;
         $news->date = $request->date;
        if ($news->save()) {
            return redirect()->back()->with('success','Успешно добавлено');
        }
        return redirect()->back()->with('error','Повторите еще раз');
    }

    public function removeNews($id, Request $request)
    {
        $news = News::find($id);
        if ($news) {
            $news->image ? File::delete(public_path('image/'.$news->image)) : false;
        }

        if ( $news->delete()) {
            return redirect()->back()->with('success','Успешно удалено');
        }
        return redirect()->back()->with('error','Повторите еще раз');

    }
}
