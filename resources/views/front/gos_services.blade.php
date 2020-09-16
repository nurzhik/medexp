@extends('layout.index')
@section('content')
<section class="page page_heading">
			<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
			<div class="container">
				<div class="title">{{__('Государственные услуги')}}</div>
				<ul class="breadcrumbs">
					<li><a href="/">{{__('Главная')}}</a></li>
					<li><a>{{__('Гражданам')}}</a></li>
					<li><a>{{__('Государственные услуги')}}</a></li>
				</ul>
			</div>
		</section>

<section class="page_section">
	<div class="container">
		<div class="page_block">
			<div class="page_content histoty_content">
				<div class="title small_title">{{__('Государственные услуги')}}</div>
				<!-- <div class="history_img">
					<img src="img/history_img.jpg" alt="">
				</div> -->
				<div class="gos-uslugi">
                    @if($gosservices->count() > 0)		<div class="gos-uslugi__item">

                        @foreach($gosservices as $item)

						<div class="gos-list">
							<div class="gos-list_item">
								<div class="gos-list__heading">{{ $item->title }}</div>

					            <ul class="gos-list__content">
                                    @foreach($item->list($item->id) as $items)
									<li>
		                           	<a class="npa_list_link" href="@if($items->type == 1) {{  url('download/ru/?data='.$item->data) }} @else {{ $items->data }}@endif" target="_blank" >{{ $items->title }}</a>
		                         	</li>
                                    @endforeach
                                </ul>

						    </div>
						</div>

                        @endforeach
                        @endif
                        </div>
                        <div class="gos-uslugi__item">
                        	<div class="gos-list">
								<div class="gos-list_item">
									<div class="gos-list__heading">Аттестация судебных экспертов</div>

						            <ul class="gos-list__content">
	                                    									<li>
			                           	<a class="npa_list_link" href=" http://adilet.zan.kz/rus/docs/V1700015033" target="_blank">Правила аттестации судебных экспертов</a>
			                         	</li>
	                                    									<li>
			                           	<a class="npa_list_link" href=" https://sudmed.106.kz/storage/gosservices/MYgSChFZfiVt96CwA35kJzz5bqaswYOPhfMR3yMT.pptx " target="_blank">Схема получения гос. услуги</a>
			                         	</li>
	                                    									<li>
			                           	<a class="npa_list_link" href=" https://sudmed.106.kz/storage/gosservices/DoPmpXOSVu5MJG6KToNnJ0fW7Ja1q31CM0c22MTY.docx " target="_blank">Форма заявления</a>
			                         	</li>
	                                                                    </ul>

							    </div>
							</div>
							<div class="gos-list">
								<div class="gos-list_item">
									<div class="gos-list__heading">Аттестация судебно-медицинских, судебно-психиатрических, судебно-наркологических экспертов</div>

						            <ul class="gos-list__content">
	                                    									<li>
			                           	<a class="npa_list_link" href=" http://adilet.zan.kz/rus/docs/V1700015033" target="_blank">Правила аттестации судебных экспертов</a>
			                         	</li>
	                                    									<li>
			                           	<a class="npa_list_link" href=" https://sudmed.106.kz/storage/gosservices/4MH3QQxDPUD9kIT8UjVKWHMd3UD6ijCS6d3CbXkb.pptx " target="_blank">Схема получения гос. услуги</a>
			                         	</li>
	                                    									<li>
			                           	<a class="npa_list_link" href=" https://sudmed.106.kz/storage/gosservices/dU9A00WUR5139r2CUA3y2SccVYUWPJBz0BHYbiZP.docx " target="_blank">Форма заявления</a>
			                         	</li>
	                                                                    </ul>

							    </div>
							</div>
                        </div>

				</div>
				@include('include.partner')
			</div>
			@include('include.sidebar')
		</div>
	</div>
</section>
@endsection
