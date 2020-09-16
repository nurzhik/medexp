@extends('layout.index')
@section('content')
<section class="page page_heading">
			<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
			<div class="container">
				<div class="title">{{__('lang.Научная деятельность')}}</div>
				<ul class="breadcrumbs">
					<li><a href="index.html">{{__('lang.Главная')}}</a></li>
					<li><a>{{__('lang.Деятельность')}}</a></li>
					<li><a>{{__('lang.Научная деятельность')}}</a></li>
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
					<div class="title small_title">{{__('lang.Научная деятельность')}}</div>
                @if($activites->count() > 0)
                    @foreach($activites as $item)
					<div class="science_item">
	                    <div class="science_text">
	                        <div class="science_name">{{ $item->file_more }}</div>
	                        <div class="text_item"> </div>
	                        <a class="science_more" href="{{  url('download/ru/?data='.$item->files) }}" download="download">{{ $item->title }}</a>
	                    </div>
	                </div>
                    @endforeach
                @endif
				@include('include.partner')
			</div>
			@include('include.sidebar')
		</div>
	</div>
</section>
@endsection
