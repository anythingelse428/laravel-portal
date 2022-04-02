@extends('layouts.app')
@section('content')
<div class="d-flex section__holder">
    <div class="row-cols-1">
        @if ($urls)
        @foreach ($urls as $item)
        <p><i class="bi bi-arrow-return-right "></i><a href="{{$item}}" download>{{$item}}</a></p>
        @endforeach
        @else
            <h1 class="">Файлов нет</h1>
            @endif
            <a class="text-success" href="{{ url()->previous() }}">Назад</a>

    </div>
</div>
   
@endsection