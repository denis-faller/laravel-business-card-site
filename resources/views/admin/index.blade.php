@extends('layouts.admin.index')

@section('content')
    <div class="row grid-row">
        <div class="col-sm grid-col grid-edit">
            <button onclick = "document.location.href = '{{route('admin.StaticPage.create')}}'"><i class="material-icons">create</i> Создать</button>
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
            <button onclick = "document.location.href = '{{route('admin.StaticPage.edit', $page->id)}}'"><i class="material-icons">edit</i> Редактировать</button>
            @if($page->id != $mainPageId)<button class = "delete-button" data-id = "{{$page->id}}" data-name = "{{$page->name}}" data-token = "{{csrf_token()}}"><i class="material-icons">delete</i> Удалить</button>@endif
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