@extends('layouts.app')
@section('content')
<div class="container">
    @role('Admin')
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link text-light" aria-current="page" href="{{ route('allusers') }}">Информация о всех пользователях</a>
        <a class="flex-sm-fill text-sm-center nav-link text-light" href="{{ route('insert') }}">Добавление записи (не олимпиады)</a>
        <a class="flex-sm-fill text-sm-center nav-link text-light" href="{{ route('olymp_insert') }}">Добавление олимпиады</a>

        <div class="d-flex flex-row mt-3 mx-auto " id="files">

            @foreach ($allOlymp as $olyy)
            <a class="flex-sm-fill text-sm-center nav-link text-light" href="/allfiles/{{$olyy}}">{{$olyy}}</a>

            @endforeach
        </div>

    </nav>
    @endrole
    <div class="lkHold d-flex ">
        <div class="cabinet d-flex flex-column">
            <div class="avatar">
                <i class="{{$avatar}}"></i>
            </div>
            <div class="edit"><a href='editprofile/{{$id}}'><i class="bi bi-pencil-square"></i></a></div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="sname">Фамилия</label>
                <p id="sname">{{$sname}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="name">Имя</label>
                <p id="name">{{$name}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="otchestvo">Отчество</label>
                <p id="otchestvo">{{$otchestvo}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="phone">Телефон</label>
                <p id="phone">{{$phone}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="mail">E-mail</label>
                <p id="mail">{{$mail}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="spec">Специальность</label>
                <p id="spec">{{$spec}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="whoIs">Занятость</label>
                <p id="whoIs">{{$whoIs}}</p>
            </div>
            <div class="d-flex justify-content-between cabinet__line">
                <label for="userOlymp">Текущая олимпиада</label>
                <p id="userOlymp">
                    @if ($userOlymp)
                    @foreach ($userAllOlymp as $olympName)
                    <i class="olympName d-flex"><a class="text-danger" href="/deleteOlymp/{{$id}}/{{$olympName}}"><i class="bi bi-x-circle"></i></a>{{$olympName}}</i>
                    @endforeach
                    @else
                    -
                    @endif
                </p>
            </div>
        </div>
        @if ($userOlymp)

        <div class="forLoad mt-5 mx-5">
            @foreach ($userAllOlymp as $olympName)
            <form action="/loadFileFor/{{$olympName}}" method="post" enctype="multipart/form-data" class="loadForm">
                <p> Файлы для {{$olympName}}</p>
                @csrf
                <div class="mb-3">
                    <input type="file" name='image[]' class="form-control load-input" id="files" placeholder="Заголовок записи" multiple required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </div>
            </form>
            @endforeach
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
            <br>
            <div class="load_bar">

                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" id="theprogressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
                <p id='progress'></p>
            </div>
        </div>
        @endif
    </div>

    <div class="d-flex flex-column">
        <div class="dowload my-3">
            @if ($test->fUrl)
            <h3 class=" ">Загруженные файлы</h3>
            <p class="file_links">
                @foreach ($test->fUrl as $fName)
                <a href="{{ $fName }}" download="{{$fName}}" class="d-flex flex-column text-start">
                    <i class="bi bi-file-earmark-medical"></i>
                    <b> {{str_ireplace( array($userOlymp, $name,$mail,"storage/", '@/'),'',$fName)}}</b>
                </a>
                @endforeach
            </p>
            @else
            <p class=" ">
                Здесь будут отображаться загруженные файлы, судя по всему их нет.
            </p>
            @endif
        </div>


    </div>
</div>



</div>







</div>

</div>
@endsection