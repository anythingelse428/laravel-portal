@extends('layouts.app')

@section('content')

<div class="container-lg d-flex flex-column table-hover align-items-center p-5">
    <button class="bnt btn-success" onclick="exportReportToExcel(this)">Выгрузить в Excel</button>

    <table class="table table-striped table-success table-responsive-md" id="userTable">
        <th class="table text-center">Имя</th>
        <th class="table text-center">Фамилия</th>
        <th class="table text-center">Отчество</th>
        <th class="table text-center">Номер телефона <i class="bi bi-telephone"></i></th>
        <th class="table text-center">E-mail <i class="bi bi-mailbox"></i></th>
        <th class="table text-center">Образовательное учреждение <i class="bi bi-bank"></i></th>
        <th class="table text-center">Дата рождения <i class="bi bi-calendar3"></i></th>
        <th class="table text-center">Специальность <i class="bi bi-brush"></i></th>
        <th class="table text-center">Квалификация </th>
        <th class="table text-center text-center"><i class="bi bi-tools"></i></th>
        @foreach ($users as $user)


        <tr id="{{$user->id}}">
            <td>{{ $user->name }} </td>
            <td>{{ $user->sname }}</td>
            <td>{{ $user->otchestvo}}</td>
            <td>{{ $user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{ $user->education_org}}</td>
            <td>{{ $user->birth}}</td>
            <td>{{$user->spec}}</td>
            <td>{{$user->whoIs}}</td>
            <td>
                <button class="btn btn-warning" onclick="copy({{$user->id}})">Скопировать</button>
                <a href="/getUserFiles/{{$user->email}}"> <button class="btn btn-primary">К файлам юзера</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>




<h1 class="text-danger">{{ $users->links() }}</h1>
@endsection