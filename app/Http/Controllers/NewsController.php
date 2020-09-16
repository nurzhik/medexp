<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsPostRequest;
use App\News;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    use Uploader;

    private CONST PAGE = 10;

    public function list()
    {
        $news = News::paginate(PAGE);
    }
    public function index($lang = null)
    {   
        $news = News::where('lang',app()->getLocale())->orderBy('date', 'desc')->paginate(10);
        if(empty($news))
            return redirect()->to('/404');
        return view('front.news',[
            'news'=>$news,
             'lang' =>$lang,
        ]);
    }
    public function view($id,$lang=null)
    {
        $news = News::where('id',$id)->where('lang',app()->getLocale())->first();
         if(empty($news))
            return redirect()->to('/404');
         return view('front.news_view',[
            'data'=>$news,
            'lang' =>$lang,
        ]);
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        if ($news) {
            return ;
        }
        return redirect()->back();
    }

    public function postAddNews(NewsPostRequest $request)
    {
        $news = News::create([
            'title'=>$request->title,
            'image'=>$this->upload($request,'news') ?? '',
            'text'=>$request->text
        ]);

    }
    public function postUpdateNews(NewsPostRequest $request)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->image = $this->upload($request,'news') ?? $request->old_image;
        $news->text = $request->text;
        $news->save();
    }

    public function removeNews(Request $request)
    {
        $news = News::find($request->id);
        if ($news) {
            $news->image ? File::delete(public_path('image/'.$news->image)) : false;
        }
        $news->delete();

    }

}
