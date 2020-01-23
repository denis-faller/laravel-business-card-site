@extends('layouts.admin.index')

@section('content')
    <div class="row grid-row">
        <div class="col-sm grid-col grid-edit">
        </div>
        <div class="col-sm grid-col">
         Название сайта
        </div>
    </div>
    @if(isset($site))
    <div class="row">
        <div class="col-sm grid-col grid-edit">
            <button onclick = "document.location.href = '{{route('admin.Site.edit', $site->id)}}'"><i class="material-icons">edit</i> Редактировать</button>
        </div>
        <div class="col-sm grid-col">
         {{$site->name}}
        </div>
    </div>
    @endif
@endsection