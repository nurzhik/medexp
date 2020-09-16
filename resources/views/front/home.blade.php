@extends('layout.index')
@section('content')

<section class="page main_section">
	<div class="container">
		<div class="main_block">
			<div class="main_title">{{__('lang.Центр судебных экспертиз')}}</div>
			<a class="btn blue_btn" href="javascript:;">{{__('lang.Подробнее')}}</a>
		</div>
	</div>
	<video src="video/bg_video_3.mp4" muted autoplay loop poster="img/main_bg.jpg"></video>
</section>

<section class="about_section">
	<div class="container">
		<div class="about">
			<div class="about_text">
				<div class="title title_long">{{__('lang.Центр судебных экспертиз')}}</div>
				<div class="text_item">
					<p>{{__('lang.РГКП «Центр судебных экспертиз» Министерства юстиции Республики Казахстан (далее - Центр) представляет государственную систему судебной экспертизы в Казахстане. Задачей судебно-экспертной деятельности является обеспечение производства судебной экспертизы по уголовным, гражданским делам, а также по делам об административных правонарушениях.')}}</p>
				</div>
				<a class="btn blue_btn" href="/staticpage/o-centre/{{app()->getLocale()}}">{{__('lang.Подробнее')}}</a>
			</div>
			<div class="about_img">
				@if(app()->getLocale() == 'kk') 
					<video src="video/main_video_kaz.mp4" controls="true" poster="img/poster.jpg"></video>
				@elseif(app()->getLocale() == 'en')
				<video src="video/main_video_en.mp4" controls="true" poster="img/poster.jpg"></video>
				@else
				<video src="video/main_video.mp4" controls="true" poster="img/poster.jpg"></video>
				@endif
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="title title_long">{{__('lang.Блог Руководителя')}}</div>
		<div class="dir_block">
			<div class="dir_img">
				<img src="img/dir_img.jpg" alt="">
			</div>
			<div class="dir_text">
				<div class="dir_name">{{__('lang.Умбеталиев Аскар Ерболатович')}}</div>
				<div class="dir_position">{{__('lang.Директор Центра судебных экспертиз')}}</div>
				<a class="btn blue_btn" href="/staticpage/blog-rukovoditelya/{{app()->getLocale()}}">{{__('lang.Подробнее')}}</a>
			</div>
		</div>
	</div>
</section>
@include('include.map')
<section class="news_section">
	<div class="container">
		<div class="title">{{__('lang.Новости')}}</div>
		<div class="news">
            @if(config('news')->count() > 0)
                @foreach(config('news')->where('lang',app()->getLocale()) as $news)
                    <div class="news_item">
                        <a class="news_img" href="/news/view/{{ $news->id }}/{{app()->getLocale()}}">
                            <img src="{{asset('news/'.$news->image)}}" alt="">
                        </a>
                        <div class="about_news">
                            <div class="news_date">{{date('d.m.Y',strtotime($news->created_at ))}}</div>
                                <a class="news_name" href="/news/view/{{ $news->id }}/{{app()->getLocale()}}">{{ $news->title }}</a>
                                <div class="news_text text_item">		{!! Str::limit(strip_tags($news->text), 150); !!}  </div>
                            </div>
                        </div>
                @endforeach
            @endif
		</div>	
		<a class="btn blue_btn" href="/news-all/{{app()->getLocale()}}">{{__('lang.Все новости')}}</a>
	</div>
</section>
<section class="about-section">
	<div class="container">
		@include('include.partner')
	</div>
</section>
@endsection
