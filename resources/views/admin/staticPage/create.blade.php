@extends('layouts.admin.index')

@section('content')
    @include('common.errors')
    <form action = "{{route('admin.StaticPage.store')}}" method = "POST">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Название страницы</span>
            </div>
            <input value = "{{Request::old('name')}}" name = "name" type="text" class="form-control" placeholder="Название">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Описание страницы</span>
            </div>
            <input value = "{{Request::old('description')}}" name = "description" type="text" class="form-control" placeholder="Описание">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Урл страницы</span>
            </div>
            <input value = "{{Request::old('url')}}" name = "url" type="text" class="form-control" placeholder="Урл">
        </div>
         <span class="input-group-text" id="basic-addon1">Содержимое страницы</span>
         <textarea name = "html" id="textarea">{{Request::old('html')}}</textarea>
         <button class = "create-static-page" type = "submit"><i class="material-icons">create</i> Создать страницу</button>
    </form>
@endsection