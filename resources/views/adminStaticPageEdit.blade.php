@extends('layouts.appAdmin')

@section('content')
    @include('common.errors')
    <form action = "{{$url}}" method = "POST">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Название страницы</span>
            </div>
            <input value = "@if(Request::old('name') !== null){{Request::old('name')}}@else{{$page->name}}@endif" name = "name" type="text" class="form-control" placeholder="Название">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Описание страницы</span>
            </div>
            <input value = "@if(Request::old('description') !== null){{Request::old('description')}}@else{{$page->description}}@endif" name = "description" type="text" class="form-control" placeholder="Описание">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Урл страницы</span>
            </div>
            <input value = "@if(Request::old('url') !== null){{Request::old('url')}}@else{{$page->url}}@endif" name = "url" type="text" class="form-control" placeholder="Урл">
        </div>
         <span class="input-group-text" id="basic-addon1">Содержимое страницы</span>
         <textarea name = "html" id="textarea">@if(Request::old('html') !== null){{Request::old('html')}}@else{{$page->html}}@endif</textarea>
         <button class = "edit-static-page" type = "submit"><i class="material-icons">create</i>Отредактировать страницу</button>
    </form>
@endsection