@extends('layout.index')
@section('content')
<section class="page page_heading">
    <img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
    <div class="container">
        <div class="title">{!! $city->name !!}</div>
        <ul class="breadcrumbs">
            <li><a href="/">{{__('lang.Главная')}}</a></li>
            <li><a>{!! $city->name !!}</a></li>
        </ul>
    </div>
</section>

<section >
    <div class="container">
        <div class="title vakancy_title small_title">{{__('lang.Руководство')}}</div>
        <div class="table_block">
            {!! $maps->first_data !!}

        </div>
    </div>
</section>

<section class="light_blue">
    <div class="container">
        <div class="title vakancy_title small_title">{{__('lang.Виды проводимых экспертиз и исследований')}}</div>
        <div class="table_block">
            {!! $maps->second_data !!}
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="contact_block sce_contact_block">
            <div class="contact_name"> {!! $city->name !!}</div>
            {!! $city->address !!}
        </div>
    </div>
</section>
@endsection
