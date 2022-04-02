@extends('layouts.app')
@section('content')
<div class="section__holder flex-column align-items-center">
    <h1 class=""> Успех!</h1>
    <a class="text-light" href="{{ route('home') }}" >В личный кабинет <i class="bi bi-house-door "></i></a>
    <a class="text-light" href="{{ route('welcome') }}" class="d-flex flex-row-reverse"> На главную <i class="bi bi-globe "></i> </a>
</div>
@endsection