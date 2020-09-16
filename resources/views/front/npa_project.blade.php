@extends('layout.index')
@section('content')
<section class="page page_heading">
			<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
			<div class="container">
				<div class="title">{{__('lang.Проекты НПА')}}</div>
				<ul class="breadcrumbs">
					<li><a href="index.html">{{__('lang.Главная')}}</a></li>
					<li><a>{{__('lang.Деятельность')}}</a></li>
					<li><a>{{__('lang.Проекты НПА')}}</a></li>
				</ul>
			</div>
		</section>

<section class="page_section">
	<div class="container">
		<div class="page_block">
			<div class="page_content histoty_content">
				<!-- <div class="history_img">
					<img src="img/history_img.jpg" alt="">
				</div> -->
					<div class="title small_title">{{__('lang.Проекты разрабатываемых нормативных правовых актов')}}</div>
					<div class="npa_list">
                        @if($npaProjects->count() > 0)
                            @foreach($npaProjects as $item)
                                <div class="npa_list_item">
                                    <a class="npa_list_link" href="{{  url('download/ru/?data='.$item->files) }}" target="_blank" download>{{ $item->title }}</a>
                                </div>
                            @endforeach
                        @endif
					</div>
				@include('include.partner')
			</div>
			@include('include.sidebar')
		</div>
	</div>
</section>
@endsection
