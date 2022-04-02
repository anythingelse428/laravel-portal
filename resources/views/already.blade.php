@extends('layouts.app')
     @section('content')
     <div class="section__holder">

         <div class="d-flex  flex-column">
             <h1 class="">Ой, похоже Вы уже участвуете в этой олимпиаде</h1>
             <a class="text-light" href="{{ route('home') }}" >В личный кабинет <i class="bi bi-house-door "></i></a>
             <a href="{{ route('welcome') }}" class="d-flex flex-row-reverse text-light"> На главную <i class="bi bi-globe "></i> </a>
            </div>
        </div>
     @endsection