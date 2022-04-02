<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
  
    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
  
     Email
     <input type="email" name="email" value="{{ old('email') }}">
     <br>
  
     Введите новый пароль:
     <input type="password" name="password">
     <br>
   
     Подтвердите пароль:
     <input type="password" name="password_confirmation">
     <br>
  
     <button type="submit">
        Установить пароль
     </button>
  </form>s