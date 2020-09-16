@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Страницы</h1>
@stop

@section('content')
    @include('messages')
    <a href="{{route('create_staticpage')}}" class="btn btn-primary">
        Добавить
    </a>
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Файл</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staticpage as $item)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td>{{$item->title}}</td>
                <td><img src="{{asset('staticpage/'.$item->image)}}" alt="" style="max-height: 150px"></td>
                <td>
                    <a href="{{route('edit_staticpage',['item'=>$item->id])}}"><i class="fas fa-edit"></i></a>
                    <a href="{{ url('admin/staticpage/delete/'.$item->id) }}"><i class="fas fa-trash-alt" style="color:Red;"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@stop

@section('js')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@stop
