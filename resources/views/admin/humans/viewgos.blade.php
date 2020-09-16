@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Пост гос услуги</h1>
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
            <th>Данные</th>
            <th>Тип</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->data }}  </td>
                <td>
                    @if($item->type === 1)
                        Файл
                    @else
                        Ссылка
                    @endif
                </td>

                <td>
                    <a href="{{ url('admin/gosservices/'.request()->id.'/?post_id='.$item->id.'#editModal') }}"><i class="fas fa-edit"></i></a>
                    <a href="{{ url('admin/gosservices/remove/'.$item->id.'/2') }}"><i class="fas fa-trash-alt" style="color:Red;"></i></a>
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
                <form action="{{ route('addGosUslugi') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                        @csrf

                    <input type="hidden" name="type" value="2">
                    <input type="hidden" name="id" value="{{ request()->id }}">

                    <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control">
                        </div>

 <select name="lang" >
                    <option value="ru" >Русский</option>
                    <option value="kk" >Казахский</option>
                    <option value="en" >Английский</option>
                </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Тип</label>
                        <select name="type_" id="" class="form-control" >
                            <option value="">Не выбран</option>
                            <option value="1">Файл</option>
                            <option value="2">Ссылка</option>
                        </select>
                    </div>

                    
                    <div class="form-group" id="file_s" >
                        <label for="exampleInputEmail1">Загрузить файл</label>
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="form-group" id="link" >
                        <label for="exampleInputEmail1">Ссылка</label>
                        <input type="text" name="link" class="form-control">
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
            @if(request()->post_id)
            <form action="{{ route('addGosUslugi') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    @csrf
                    <input type="hidden" name="type" value="4">
                    <input type="hidden" name="id" value="{{ request()->post_id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" name="title" class="form-control" value="{{ $find->title ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Тип</label>
                        <select name="type_" id="" class="form-control" >
                            <option value="" >Не выбран</option>
                            <option value="1" @if($find->type == 1) selected @endif>Файл</option>
                            <option value="2" @if($find->type  == 2) selected @endif>Ссылка</option>
                        </select>
                    </div>
                     <select name="lang" >
                     <option value="ru" @if($find->lang == 'ru') selected @endif>Русский</option>
                    <option value="kk" @if($find->lang == 'kk') selected @endif>Казахский</option>
                    <option value="en" @if($find->lang == 'en') selected @endif>Английский</option>
                </select>
                    <div class="form-group"  @if($find->type  != 1) style="display: none;" @endif>
                        <label for="exampleInputEmail1">Загрузить файл</label>
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="form-group" @if($find->type != 2) style="display: none;" @endif >
                        <label for="exampleInputEmail1">Ссылка</label>
                        <input type="text" name="link" class="form-control" value="{{ $find->data ?? 0 }}">
                    </div>



                </div>
                <div class="modal-footer">
                    <a href="#close" class="btn btn-secondary" >Закрыть</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
           @endif
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

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'text' );
    </script>

    <script>
        $('#file_s').hide();
        $('#link').hide();
        $('select').on('change', function () {
            if(this.value == 1) {
                $('#file_s').show();
                $('#link').hide();
            }else {
                $('#link').show();
                $('#file_s').hide();
            }
        });
    </script>
@stop
