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

<form  method="post" enctype="multipart/form-data" @if(empty($item->id))action="/admin/teams/create" @else action="/admin/teams/{{$item->id}}" @endif >
    <div class="modal-body">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" name="name" value="{{ $item->name}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Должность</label>
            <input type="text" name="position" value="{{ $item->position}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea name="text" id="" cols="30" rows="10">{{ $item->text}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Язык</label>
            <select name="lang" >
                <option value="ru" @if($item->lang == 'ru') selected @endif>Русский</option>
                <option value="kk" @if($item->lang == 'kk') selected @endif>Казахский</option>
                <option value="en" @if($item->lang == 'en') selected @endif>Английский</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Позиция</label>
            <select name="type_id" >
                <option value="0" @if($item->type_id == 0) selected @endif>Директор</option>
                <option value="1" @if($item->type_id == 1) selected @endif>Сотрудник</option>
            </select>
        </div>
        @if(!empty($item->id))
            <div class="form-group">
                <label for="exampleInputEmail1">Картинка</label>
                <img src="{{  asset('teams/'.$item->image)}}" alt="" style="max-height: 200px;">
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
    <script type="text/javascript">
        var editor1=CKEDITOR.replace('text');
        editor1.config.allowedContent = true;
    </script>
    <script type="text/javascript">
        var editor1=CKEDITOR.replace('text2');
        editor1.config.allowedContent = true;
    </script>
@stop