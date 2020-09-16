<div class="page_sidebar">
	<div class="title">{{__('lang.Новости')}}</div>
	<div class="news">
		@foreach(\App\News::where('id','>',0)->where('lang',app()->getLocale())->orderBy('date', 'desc')->get() as $news)
            <div class="news_item">
				<a class="news_img" href="/news/view/{{ $news->id }}/{{ $news->lang }}">
					<img src="{{asset('news/'.$news->image)}}" alt="">
				</a>
				<div class="about_news">
					<div class="news_date">{{date('d.m.Y',strtotime($news->date ))}}</div>
					<a class="news_name" href="/news/view/{{ $news->id }}/{{ $news->lang }}">{{ $news->title }}</a>
					<div class="news_text text_item">{!! Str::limit(strip_tags($news->text), 150); !!}</div>
				</div>
			</div>
        @endforeach
	</div>
</div>
