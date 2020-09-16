@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{$item->title}}</div>
		<ul class="breadcrumbs">
			<li><a href="/">{{__('lang.Главная')}}</a></li>
			<li><a>{{__('lang.О нас')}}</a></li>
			<li><a>{{$item->title}}</a></li>
		</ul>
	</div>
</section>

	@if($item->type_id == 0)
		<section class="page_section">
			<div class="container">
				<div class="page_block">
					<div class="page_content histoty_content">
						<div class="title">{{$item->title}}</div>
						<div class="page_text">
							{!!$item->text!!}
							@if($item->slug == 'blog-rukovoditelya')
								@foreach($teams as $item)
									@if($item->type_id == 0)
									{!! $item->text !!}
									@endif 
					            @endforeach 
							@endif
						</div>
						@if($item->slug == 'prejskurant-cen-platnyh-uslug-centra-sudebnyh-ekspertiz')
							<div class="doc_list">
									<a class="doc_item" href="/files/dosc/b68e986cfb289cff0dcc60ef0a4e0556.docx" download="">Шаблон Договора на оказание платных услуг</a>
							</div>
						@endif

						
						@if($item->slug == 'proekt-vsemirnogo-banka')
							<div class="title">СМИ О Проекте</div>
							<div class="gallery_block">
								<div class="bank_gallery">
									@foreach($slides as $item)
										@if($item->type_id ==1)
										<div>
						               		<div class="bank_gal_item" data-fancybox="gallery" data-src="{{asset('slides/'.$item->image )}}">
												<img src="{{asset('slides/'.$item->image )}}">
											</div>
										</div>
										@endif 
						            @endforeach 
								</div>
								<div class="bank_gal_control"></div>
							</div>
						@endif
						@if($item->slug == 'akkreditaciya-institutov')
							
							<div class="gallery_block">
								<div class="bank_gallery">
									@foreach($slides as $item)
										@if($item->type_id ==0)
										<div>
						               		<div class="bank_gal_item" data-fancybox="gallery" data-src="{{asset('slides/'.$item->image )}}">
												<img src="{{asset('slides/'.$item->image )}}">
											</div>
										</div>
										@endif 
						            @endforeach 
								</div>
								<div class="bank_gal_control"></div>
							</div>
						@endif
						@include('include.partner')
					</div>
					@include('include.sidebar')
				</div>
			</div>
		</section>
	@else
		<section >
			<div class="container">
				@if($item->slug != 'struktura')
				<div class="title">{{$item->title}}</div>
					
				@endif
				<div class="page_text">
					{!!$item->text!!}
				</div>
				@if($item->slug != 'struktura')
					@include('include.partner')
				@endif
					
			</div>
		</section>
		@if($item->slug == 'struktura')
			<section class="dark_blue">
				<div class="container">
					<div class="team_list">
						@foreach($teams as $item)
							@if($item->type_id ==0)
							<div class="team_item" data-fancybox data-src="#team_popup_id">
								<a href="javascript:;" class="team_img" data-text="{!! $item->text !!}">
									<img src="{{asset('teams/'.$item->image )}}">
								</a>

								<div class="dir_position">{{$item->position}}</div>
								<div class="team_name">{{$item->name}}</div>
							</div>
							@endif 
			            @endforeach 
					</div>
				</div>
			</section>

			<section class="light_blue">
				<div class="container">
					<div class="team_list">
						@foreach($teams as $item)
							@if($item->type_id == 1)
							<div class="team_item" data-fancybox data-src="#team_popup_id">
								<a href="javascript:;" class="team_img" data-text="{!! $item->text !!}">
									<img src="{{asset('teams/'.$item->image)}} ">
								</a>
								<div class="dir_position">{{$item->position}}</div>
								<div class="team_name">{{$item->name}}</div>
							</div>
							@endif 
			            @endforeach 
					</div>
				</div>
			</section>
			<div class="popup team_popup" id="team_popup_id">
				<div class="team_info_heading">
					<div class="team_img">
						<img src="" alt="">
					</div>
					<div class="team_info_name">
						<div class="team_name"></div>
						<div class="dir_position"></div>
					</div>
				</div>
				<div class="team_info_text"></div>
			</div>
			<section>
				<div class="container">
					@include('include.partner')
				</div>
			</section>
		@endif
	@endif
@endsection