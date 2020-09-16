@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{__('lang.Виды проводимых экспертиз')}}</div>
		<ul class="breadcrumbs">
			<li><a href="index.html">{{__('lang.Главная')}}</a></li>
			<li><a>{{__('lang.Деятельность')}}</a></li>
			<li><a>{{__('lang.Виды проводимых экспертиз')}}</a></li>
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
				<div class="title small_title">{{__('lang.Виды проводимых экспертиз')}}</div>
						<div class="expertise_type">
                            @if($expertise->count() > 0)
                                @foreach($expertise as $item)
                                    <div class="expertise-item">
                                        <div class="expertise-item__heading">{{ $item->title }}</div>

                                            <ul class="iex-ul">
                                                @foreach($item->expertiseList($item->id) as $listItem)
                                                    <li>
                                                        <a href="{{ url('expertise/view/'.$listItem->id) }}">{{ $listItem->title }}</a>
                                                    </li>

                                                @endforeach
                                            </ul>
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
