@extends('layouts.admin.index')

@section('content')
    @include('common.errors')
    <form action = "{{route('admin.Site.update', $site->id)}}" method = "POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Название сайта</span>
            </div>
            <input value = "@if(Request::old('name') !== null){{Request::old('name')}}@else{{$site->name}}@endif" name = "name" type="text" class="form-control" placeholder="Название">
        </div>
         <button class = "edit-static-page" type = "submit"><i class="material-icons">create</i>Отредактировать сайт</button>
    </form>
@endsection