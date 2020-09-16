@extends('layout.index')
@section('content')
<section class="page_section page_section_inner">
<div class="container">
    <div class="page_block">
        <div class="page_content">
            <ul class="breadcrumbs">
                <li><a href="/">{{__('lang.Главная')}}</a></li>
                <li><a href="/news-all">{{__('lang.Новости')}}</a></li>
                <li><a>{{ $data->title }}</a></li>
            </ul>
            <div class="page_img">
                <img src="{{  asset('news/'.$data->image)}}" alt="">
            </div>
            <div class="share_block page_share_block">
                <div class="share_text">{{__('lang.Поделиться в соц. сетях:')}}</div>
                <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                <script src="https://yastatic.net/share2/share.js"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,whatsapp,telegram"></div>
            </div>
            <div class="title small_title">{{ $data->title }}</div>
            <div class="page_text">
               {!! $data->text !!}
            </div>
        </div>
        @include('include.sidebar')
    </div>
</div>
</section>
@endsection
