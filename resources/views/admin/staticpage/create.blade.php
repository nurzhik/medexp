@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Страницы</h1>
@stop

@section('content')
    @include('messages')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    	<script type="text/javascript">
        $(document).ready(function(){
           
            function translit(text) {
                // Символ, на который будут заменяться все спецсимволы
                var space = '-';

                // Массив для транслитерации
                var transl = {
                    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                    'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                    'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                    'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya',
                    ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                    '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                    '(': space, ')': space, '-': space, '\=': space, '+': space, '[': space,
                    ']': space, '\\': space, '|': space, '/': space, '.': space, ',': space,
                    '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                    '?': space, '<': space, '>': space, '№': space,
                    'ә': 'a', 'Ә': 'a',
                    'Ғ': 'g', 'ғ': 'g',
                    'Ө': 'o', 'ө': 'o',
                    'Қ': 'k', 'қ': 'k',
                    'ң': 'n', 'і': 'i',
                    'Ұ': 'u', 'ұ': 'u',
                    'Ү': 'u', 'ү': 'u'
                };

                var result = '';
                var curent_sim = '';

                for (i = 0; i < text.length; i++) {
                    // Если символ найден в массиве то меняем его
                    if (transl[text[i]] != undefined) {
                        if (curent_sim != transl[text[i]] || curent_sim != space) {
                            result += transl[text[i]];
                            curent_sim = transl[text[i]];
                        }
                    }
                    // Если нет, то оставляем так как есть
                    else {
                        result += text[i];
                        curent_sim = text[i];
                    }
                }

                return result;
            }

            if ($('[name="title"]').length && $('[name="slug').length) {
                $('[name="title').on('keyup', function () {
                    $('[name="slug').val(translit($(this).val().toLowerCase()));
                });
            }
            
            
        });
    </script>
<form action="{{ route('store_staticpage') }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Тип страницы</label>
            <select class="form-control" name="type_id" id="">
                <option value="0">С сайдбаром</option>
                <option value="1">Без сайдбара</option>
            </select>
        </div>	
        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea name="text" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Язык</label>
            <select name="lang" >
                <option value="ru">Русский</option>
                <option value="kk">Казахский</option>
                <option value="en">Английский</option>
            </select>
        </div>
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