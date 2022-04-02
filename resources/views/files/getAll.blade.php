@extends('layouts.app')
@section('content')
<div class="d-flex section__holder">
    <div class="row-cols-1">
        <h2>{{$whatOlymp}}</h2>
        @if ($AllFilesOlymp)
        <button class="btn btn-success" onclick="DownloadAll()">
            Скачать все
        </button>


        <ol>

            @foreach ($AllFilesOlymp as $FileLink)
            <li>

                <a href="{{$FileLink}}" class="downloadLink" target="_blank" download={{str_ireplace(" ",'_',str_ireplace(array("/storage"),'',$FileLink))}}>{{str_ireplace(array("/storage",$whatOlymp),'',$FileLink)}}</a> 
            </li>
            @endforeach
        </ol>
        @else
            <h1 class="">Файлов нет</h1>
            @endif
            <a class="text-success" href="{{ url()->previous() }}">Назад</a>
    </div>
</div>
   
@endsection