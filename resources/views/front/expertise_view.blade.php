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

<section class="page_section page_section_inner">
    <div class="container">
        <div class="page_block">
            <div class="page_content">
                <ul class="breadcrumbs">
                    <li><a href="/">{{__('lang.Главная')}}</a></li>
                    <li><a>{{__('lang.Деятельность')}}</a></li>
                    <li><a href="/">{{__('lang.Виды проводимых экспертиз')}}</a></li>
                    <li><a>{{$data->title}}</a></li>
                </ul>
                <div class="page_img">
                    <img src="/img/expertises/" alt="">
                </div>
                <div class="title small_title">{{$data->title}}</div>
                <div class="page_text">
                    {!!$data->text!!}
                </div>
                @include('include.partner')
            </div>
              @include('include.sidebar')
            
        </div>
    </div>
</section>
@endsection