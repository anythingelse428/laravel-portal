@extends('layouts.app')

@section('content')
<form method="POST" action="/password/email">
    {!! csrf_field() !!}
 
    @if (count($errors) > 0)
       <ul>
          @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
          @endforeach
       </ul>
    @endif
 
    Email:
    <input type="email" name="email" value="{{ old('email') }}">
    <br>
 
    <button type="submit">
       Отправить инструкции по 
       восстановлению пароля на почту
    </button>
 </form>
@endsection
