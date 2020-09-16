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

<form  method="post" enctype="multipart/form-data" @if(empty($item->id))action="/admin/slides/create" @else action="/admin/slides/{{$item->id}}" @endif >
    <div class="modal-body">

        @csrf
       
        <div class="form-group">
            <label for="exampleInputEmail1">Тип</label>
            <select name="type_id" >
                <option value="0" @if($item->type_id == 0) selected @endif>Сертификат</option>
                <option value="1" @if($item->type_id == 1) selected @endif>Слайд на странице Всемирный банк</option>
            </select>
        </div>
     
        @if(!empty($item->id))
            <div class="form-group">
                <label for="exampleInputEmail1">Картинка</label>
                <img src="{{  asset('slides/'.$item->image)}}" alt="" style="max-height: 200px;">
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
