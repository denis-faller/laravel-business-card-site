@extends('layouts.appAdmin')

@section('content')
    <div class="row grid-row">
        <div class="col-sm grid-col grid-edit">
            <button onclick = "document.location.href = '/admin/static-page/create/show/'"><i class="material-icons">create</i> Создать</button>
        </div>
        <div class="col-sm grid-col">
         Имя
        </div>
        <div class="col-sm grid-col">
         Описание
        </div>
        <div class="col-sm grid-col">
          Урл
        </div>
        <div class="col-sm grid-col">
          html
        </div>
    </div>
    @foreach($pages as $page)
    <div class="row">
        <div class="col-sm grid-col">
            <button onclick = "document.location.href = '/admin/static-page/edit/show/{{$page->id}}'"><i class="material-icons">edit</i> Редактировать</button>
            @if($page->id != $mainPageId)<button onclick = "document.location.href = '/admin/static-page/delete/show/{{$page->id}}'"><i class="material-icons">delete</i> Удалить</button>@endif
        </div>
        <div class="col-sm grid-col">
          {{$page->name}}
        </div>
        <div class="col-sm grid-col">
          {{$page->description}}
        </div>
        <div class="col-sm grid-col">
          {{$page->url}}
        </div>
        <div class="col-sm grid-col">
          {{mb_substr($page->html, 0, 10)}} ...
        </div>
    </div>
   @endforeach
@endsection