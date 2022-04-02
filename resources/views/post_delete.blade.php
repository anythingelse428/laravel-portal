@extends('layouts.app')
@section('content')
<div class="section__holder flex-column align-items-center">
    <h2 class="">Запись удалена!</h2>

        <a href="{{ route('home') }}">В личный кабинет <i class="bi bi-house-door mx-1"></i></a>
        <a href="{{ route('welcome') }}" class="d-flex flex-row-reverse"> На главную <i class="bi bi-globe mx-2"></i> </a>

</div>
@endsection