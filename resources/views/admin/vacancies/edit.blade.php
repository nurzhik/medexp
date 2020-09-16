@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>План работы</h1>
@stop

@section('content')
    @include('messages')

<form action="/admin/vacancy/{{$item->id}}" method="POST" enctype="multipart/form-data">
    <div class="modal-body">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Регион</label>
            <select class="form-control" name="region_id" id="">
                <option value="1" @if($item->region_id == 1) selected @endif>Институт судебных экспертиз по г.Нур-Султан</option>
                <option value="2" @if($item->region_id == 2) selected @endif>Институт судебных экспертиз по г. Алматы</option>
                <option value="3" @if($item->region_id == 3) selected @endif>Аппарат Центра судебных экспертиз</option>
                <option value="4" @if($item->region_id == 4) selected @endif>Научно-исследовательский институт судебных экспертиз (г. Нур-Султан)</option>
                <option value="5" @if($item->region_id == 5) selected @endif>Актюбинский межрегиональный центр судебных экспертиз (г. Актобе)</option>
                <option value="6" @if($item->region_id == 6) selected @endif>Институт судебных экспертиз по Атырауской области (г. Атырау)</option>
                <option value="7" @if($item->region_id == 7) selected @endif>Институт судебных экспертиз по г. Жезказган</option>
                <option value="8" @if($item->region_id == 8) selected @endif>Институт судебных экспертиз по Карагандинской области (г. Караганда)</option>
                <option value="9" @if($item->region_id == 9) selected @endif>Институт судебных экспертиз по Акмолинской области (г. Кокшетау)</option>
                <option value="10" @if($item->region_id == 10) selected @endif>Институт судебных экспертиз по Костанайской области (г. Костанай)</option>
                <option value="11" @if($item->region_id == 11) selected @endif>Институт судебных экспертиз по Кызылординской области (г.Кызылорда)</option>
                <option value="12" @if($item->region_id == 12) selected @endif>Институт судебных экспертиз по Мангистауской области (г. Актау)</option>
                <option value="13" @if($item->region_id == 13) selected @endif>Институт судебной экспертизы по Павлодарской области (г. Павлодар)</option>
                <option value="14" @if($item->region_id == 14) selected @endif>Институт судебных экспертиз по Северо-Казахстанской области (г. Петропавловск)</option>
                <option value="15" @if($item->region_id == 15) selected @endif>Институт судебных экспертиз по г. Семей</option>
                <option value="16" @if($item->region_id == 16) selected @endif>Институт судебных экспертиз по Алматинской области (г. Талдыкорган)</option>
                <option value="17" @if($item->region_id == 17) selected @endif>Институт судебных экспертиз по Жамбылской области (г. Тараз)</option>
                <option value="18" @if($item->region_id == 18) selected @endif>Институт судебных экспертиз по Туркестанской области</option>
                <option value="19" @if($item->region_id == 19) selected @endif>Институт судебных экспертиз по Западно-Казахстанской области (г. Уральск)</option>
                <option value="20" @if($item->region_id == 20) selected @endif>Институт судебных экспертиз по Восточно-Казахстанской области (г. Усть-Каменогорск)</option>
                <option value="21" @if($item->region_id == 21) selected @endif>Институт судебных экспертиз по г. Шымкент</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea name="text" id="" cols="30" rows="10">{{$item->text}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Язык</label>
            <select name="lang" >
                <option value="ru" @if($item->lang == 'ru') selected @endif>Русский</option>
                <option value="kk" @if($item->lang == 'kk') selected @endif>Казахский</option>
                <option value="en" @if($item->lang == 'en') selected @endif>Английский</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>

@stop

@section('css')
@stop

@section('js')

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        var editor1=CKEDITOR.replace('text');
        editor1.config.allowedContent = true;
    </script>
    <script type="text/javascript">
        var editor1=CKEDITOR.replace('text2');
        editor1.config.allowedContent = true;
    </script>
@stop
