@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{__('lang.База НПА')}}</div>
		<ul class="breadcrumbs">
			<li><a href="index.html">{{__('lang.Главная')}}</a></li>
			<li><a>{{__('lang.Деятельность')}}</a></li>
			<li><a>{{__('lang.База НПА')}}</a></li>
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
				<div class="title small_title">{{__('lang.Нормативно-правовая база обеспечения деятельности по производству судебных экспертиз')}}</div>
				<div class="npa_list">
                    @if($npaBase->count() > 0)
                        @foreach($npaBase as $item)
                            <div class="npa_list_item">
                                <span>{{ $item->title }}</span>
                                <a class="npa_list_link" href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
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
