@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Объекты</h1>
@stop

@section('content')
    @include('messages')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Добавить
    </button>
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Aдрес</th>
            <th>Город</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($objects as $item)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td>
                    <a href="{{ url('admin/map/add_detailsobjects?post_id='.$item->id) }}">
                        {{ $item->name }}
                    </a>
                    </td>
                <td> {{ $item->city['name'] }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    <a href="{{ url('admin/map/objects/?post_id='.$item->id.'#editModal') }}"><i class="fas fa-edit"></i></a>
                    <a href="{{ url('admin/map/remove/'.$item->id.'/2') }}"><i class="fas fa-trash-alt" style="color:Red;"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addObjects') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" name="type" value="3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="link">Адрес</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="link">Город</label>
                            @if($city->count() > 0)
                                <select name="city_id">
                                    @foreach($city as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            @endif
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
            </div>
        </div>
    </div>
    <div id="editModal" class="modalDialog" >
        <div>
            <a href="#close" title="Закрыть" class="close">X</a>
            <h4>Редактировать</h4>
            <form action="{{ route('updateObjects') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    @csrf
                    <input type="hidden" name="type" value="3">
                    <input type="hidden" name="id" value=" {{ request()->post_id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" name="name" class="form-control" value="{{ $find->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="link">Адрес</label>
                        <input type="text" name="address" class="form-control" value="{{ $find->address ?? '' }}">
                    </div>
                    @if(request()->post_id)
                    <div class="form-group">
                        <label for="link">Город</label>
                        @if($city->count() > 0)
                            <select name="city_id">
                                @foreach($city as $item)
                                    <option value="{{ $item->id }}" @if($find->city_id == $item->id) selected @endif> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Язык</label>
                            <select name="lang" >
                                <option value="ru" @if($find->lang == 'ru') selected @endif>Русский</option>
                                <option value="kk" @if($find->lang == 'kk') selected @endif>Казахский</option>
                                <option value="en" @if($find->lang == 'en') selected @endif>Английский</option>
                            </select>
                        </div>
                    @endif



                </div>
                <div class="modal-footer">
                    <a href="#close" class="btn btn-secondary" >Закрыть</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/modal.css?cahc='.time()) }}">

@stop

@section('js')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@stop
