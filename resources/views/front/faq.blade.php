@extends('layout.index')
@section('content')
<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">{{__('Часто задаваемые вопросы')}}</div>
		<ul class="breadcrumbs">
			<li><a href="/">{{__('Главная')}}</a></li>
			<li><a>{{__('Гражданам')}}</a></li>
			<li><a>{{__('Часто задаваемые вопросы')}}</a></li>
		</ul>
	</div>
</section>

<section >
	<div class="container">
		<div class="title">{{__('Часто задаваемые вопросы')}}</div>
		<div class="faq">
			@if($items->count() > 0)
				@foreach($items as $item)
		     
		        <div class="faq_item">
		          <div class="faq_question">{{$item->title}}<div class="faq_quest_icon"></div></div>
		          <div class="faq_answer">
		            {!!$item->text!!}
		          </div>
		        </div>
		      @endforeach
	      @endif
	      
	    </div>
		@include('include.partner')
			
	</div>
</section>
@endsection