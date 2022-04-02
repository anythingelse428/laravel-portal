<html>
 
  <head>
    
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
     <title>Добавление олимпиады</title>
  </head>
  
        <body>
        @extends('layouts.app')
            @section('content')
            <form action = "/updatepost/{{$id}}" method = "post" class="m-2">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            
                <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Заголовок</label>
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="{{$postTitle}}" placeholder="Заголовок записи">
        </div>

        <div class="mb-3">

        <label for="formGroupExampleInput2" class="form-label">Про олимпиаду(кратенько)</label>
        <textarea type="text" name="text" class="form-control" id="formGroupExampleInput2" placeholder="Содержание олимпиады на странице">
            {!!$postText!!}
        </textarea>
        <script>
            setTimeout(function(){CKEDITOR.replace( 'formGroupExampleInput2' ); },400);
            </script>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Файл к олимпиаде</label>
            <input type="text" name="pictures" class="form-control" id="formGroupExampleInput2" value="{{$postPicture}}" placeholder="Файл к олимпиаде">
        </div>
        
        <input type = 'submit' class="btn btn-outline-success" value = "Изменить"/>

            </form>
            @endsection
            
  </body>
</html>