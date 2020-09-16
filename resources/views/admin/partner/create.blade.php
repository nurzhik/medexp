@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <h1>
@if(empty($item->id))
        Добавление 
    @else
        Редактирование
    @endif
</h1>
@stop

@section('content')
    @include('messages')

<form  method="post" enctype="multipart/form-data" @if(empty($item->id))action="/admin/partners/create" @else action="/admin/partners/{{$item->id}}" @endif >
    <div class="modal-body">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" name="title" value="{{ $item->title}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" name="link" value="{{ $item->link}}" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Язык</label>
            <select name="lang" >
               <option value="ru" @if($itemitem->lang == 'ru') selected @endif>Русский</option>
                <option value="kk" @if($item->lang == 'kk') selected @endif>Казахский</option>
                <option value="en" @if($item->lang == 'en') selected @endif>Английский</option>
            </select>
        </div>
        @if(!empty($item->id))
            <div class="form-group">
                <label for="exampleInputEmail1">Картинка</label>
                <img src="{{  asset('partners/'.$item->image)}}" alt="" style="max-height: 200px;">
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Загрузить файл</label>
            <input type="file" name="file" class="form-control">
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
    <script>
        CKEDITOR.replace( 'text' );
    </script>
@stop
