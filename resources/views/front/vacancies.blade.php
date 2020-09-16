@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{__('lang.Вакансии')}}</div>
		<ul class="breadcrumbs">
			<li><a href="/">{{__('lang.Главная')}}</a></li>
			<li><a>{{__('lang.Деятельность')}}</a></li>
			<li><a>{{__('lang.Вакансии')}}</a></li>
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
				<div class="title small_title">{{__('lang.Вакансии')}}</div>
				<select   id="selectRegion" class="form-control custom-select vakancy_select">
	               	<option data-id="1">Институт судебных экспертиз по г.Нур-Султан</option>
	                <option data-id="2">Институт судебных экспертиз по г. Алматы</option>
	                <option data-id="3">Аппарат Центра судебных экспертиз</option>
	                <option data-id="4">Научно-исследовательский институт судебных экспертиз (г. Нур-Султан)</option>
	                <option data-id="5">Актюбинский межрегиональный центр судебных экспертиз (г. Актобе)</option>
	                <option data-id="6">Институт судебных экспертиз по Атырауской области (г. Атырау)</option>
	                <option data-id="7">Институт судебных экспертиз по г. Жезказган</option>
	                <option data-id="8">Институт судебных экспертиз по Карагандинской области (г. Караганда)</option>
	                <option data-id="9">Институт судебных экспертиз по Акмолинской области (г. Кокшетау)</option>
	                <option data-id="10">Институт судебных экспертиз по Костанайской области (г. Костанай)</option>
	                <option data-id="11">Институт судебных экспертиз по Кызылординской области (г.Кызылорда)</option>
	                <option data-id="12">Институт судебных экспертиз по Мангистауской области (г. Актау)</option>
	                <option data-id="13">Институт судебной экспертизы по Павлодарской области (г. Павлодар)</option>
	                <option data-id="14">Институт судебных экспертиз по Северо-Казахстанской области (г. Петропавловск)</option>
	                <option data-id="15">Институт судебных экспертиз по г. Семей</option>
	                <option data-id="16">Институт судебных экспертиз по Алматинской области (г. Талдыкорган)</option>
	                <option data-id="17">Институт судебных экспертиз по Жамбылской области (г. Тараз)</option>
	                <option data-id="18">Институт судебных экспертиз по Туркестанской области</option>
	                <option data-id="19">Институт судебных экспертиз по Западно-Казахстанской области (г. Уральск)</option>
	                <option data-id="20">Институт судебных экспертиз по Восточно-Казахстанской области (г. Усть-Каменогорск)</option>
	                <option data-id="21">Институт судебных экспертиз по г. Шымкент</option>
             	</select> 
             	<div class="vakancy_list">
             		@foreach($vacancies as $item)
                        <div class="table_block" data-table-id="{{$item->region_id}}">
	                       {!!$item->text!!}
	                    </div>
                    @endforeach
	               
	             </div>
				@include('include.partner')
			</div>
			@include('include.sidebar')
		</div>
	</div>
</section>
@endsection
