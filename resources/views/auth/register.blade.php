@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center auth">
        <div class="col-md-8">
            <div class="card mt-5 mb-3">
                <div class="card-header text-dark">Регистрация</div>

                <div class="card-body bg-authLike">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group justify-content-start">
                            <div class="form-group row">
                                <label for="sname" class="col-md-4 col-form-label text-md-left">Фамилия</label>
    
                                <div class="col-md-6">
                                    <input id="sname" type="text" class="form-control " name="sname" value="{{ old('sname') }}" required autocomplete="sname" autofocus>                       
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">Имя</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="otchestvo" class="col-md-4 col-form-label text-md-left">Отчество</label>
                            <div class="col-md-6">
                                <input id="otchestvo" type="text" class="form-control " name="otchestvo" value="{{ old('otchestvo') }}" required autocomplete="otchestvo" autofocus>                       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-left">Телефон</label>
                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control " name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label text-md-left">Дата рождения</label>
                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control " name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>                       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="whoIs" class="col-md-4 col-form-label text-md-left">Деятельность</label>
                            <div class="col-md-6">
                                <select name="whoIs" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                      <li><option class="dropdown-item" id="whoIs" type="text" class="form-control " name="whoIs" value="Студент" required  autofocus>Студент</option></li>
                                    <li><option class="dropdown-item" id="whoIs" type="text" class="form-control " name="whoIs" value="Школьник" required  autofocus>Школьник</option></li>
                                    <li><option class="dropdown-item" id="whoIs" type="text" class="form-control " name="whoIs" value="Преподаватель" required  autofocus>Преподаватель</option></li>
                                </ul>                       
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education_org" class="col-md-4 col-form-label text-md-left">Образовательное учреждение</label>
                            <div class="col-md-6">
                                <input id="education_org" type="text" class="form-control " name="education_org" value="{{ old('education_org') }}" required autocomplete="education_org" autofocus>                       
                            </div>
                        </div>

                 
                        <div class="form-group row">
                            <label for="spec" class="col-md-4 col-form-label text-md-left">Специальность</label>
                            <div class="col-md-6">
                                <input id="spec" type="text" class="form-control " name="spec" value="{{ old('spec') }}" required autocomplete="spec" autofocus placeholder="Программист">                       
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-left">Подтверждение пароля</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
