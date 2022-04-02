@extends('layouts.app')
     @section('content')
     <form action = "/updateprofile/{{$id}}" method = "post" class="mx-auto cabinet d-flex flex-column align-items-center">
        <h2 class="mb-4">Редактирование профиля</h2>
        <input class="py-2 my-2 border rounded " type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <input class="py-2 my-2 border rounded " type="text" value="{{$name}}" name="name" readonly="readonly">
        <input class="py-2 my-2 border rounded " type="text" value="{{$sname}}" name="sname">
        <input class="py-2 my-2 border rounded " type="text" value="{{$otchestvo}}" name="otchestvo">
        <select  class="py-2 my-2 border rounded " name="whoIs" id="whoIs">
            <option name="whoIs" id="whoIs" value="Студент"
            @if ($whoIs=="Студент")
            selected="{{$whoIs}}"
        @endif
            >Студент</option>
            <option name="whoIs" id="whoIs" value="Преподаватель"
            @if ($whoIs=="Преподаватель")
            selected="{{$whoIs}}"
        @endif
            >Преподаватель</option>
            <option name="whoIs" id="whoIs" value="Школьник"
            @if ($whoIs=="Школьник")
            selected="{{$whoIs}}"
        @endif
            >Школьник</option>
        </select>
        <div class="dropdown dropend d-flex col-5">
            <button class="btn btn-light dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Аватарки
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                <div class="d-flex">
                    <div class="d-flex flex-column-reverse avatar align-items-center m-2">
                <input type="radio" class="dropdown-item d-flex flex-column-reverse align-items-center" name="avatar" value="bi bi-person-circle" id="person"
                @if ($avatar=="bi bi-person-circle")
                checked="{{$avatar}}"
                @endif/>
                <label for="person"><i class="bi bi-person-circle "></i></label>
                    </div>
                <div class="d-flex flex-column-reverse avatar align-items-center m-2">
                <input type="radio" class="dropdown-item d-flex flex-column-reverse align-items-center" name="avatar" value="bi bi-emoji-sunglasses" id="sunglasses"
                @if ($avatar=="bi bi-emoji-sunglasses")
                checked="{{$avatar}}"
                @endif/>
                <label for="sunglasses"><i class="bi bi-emoji-sunglasses "></i></label>
                    </div>
                <div class="d-flex flex-column-reverse avatar align-items-center m-2">
                <input type="radio" class="dropdown-item" name="avatar" value="bi bi-emoji-heart-eyes" id="heart"
                @if ($avatar=="bi bi-emoji-heart-eyes")
                checked="{{$avatar}}"
                @endif/>
                <label for="heart"><i class="bi bi-emoji-heart-eyes "></i></label>
                    </div>
            </div>
        </div>
          </div>
        <input class="py-2 my-2 border rounded " type="text" value="{{$spec}}" name="spec">
        
    
        <input class="py-2 my-2 border rounded " type="text" value="{{$mail}}" name="mail" readonly="readonly">
        <input class="py-2 my-2 border rounded " type="text" value="{{$phone}}" name="phone">
        <input class="py-2 my-2 border rounded " type="text" value="{{$birth}}" name="birth">
        <input class="py-2 my-2 border rounded " type="text" value="{{$education_org}}" name="education_org">
<input type = 'submit' class="btn btn-outline-success mt-4 mb-4" value = "Изменить"/>

       </form>
     @endsection
     