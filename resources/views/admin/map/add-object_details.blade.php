@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>План работы</h1>
@stop

@section('content')
    @include('messages')

<form action="{{ route('postObjectDetails') }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        @csrf


        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea name="text" id="" cols="30" rows="10" >{{ $find->first_data ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea name="text2" id="" cols="30" rows="10" >{{ $find->second_data ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Выберите объекты</label>
            <select name="city_object" >
                @foreach($objects as $item)
                    <option value="{{ $item->id }}" @if(request()->post_id == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                            <label for="exampleInputEmail1">Язык</label>
                            <select name="lang" >
                                <option value="ru">Русский</option>
                                <option value="kk">Казахский</option>
                                <option value="en">Английский</option>
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
