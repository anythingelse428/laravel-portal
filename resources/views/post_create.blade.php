<html>
 
  <head>
     <title>Добавление записи</title>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
     
  </head>
  
  <body>
  @extends('layouts.app')
     @section('content')
     <form action = "/create" method = "post" class=" m-2">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Заголовок</label>
  <input type="text" name='title' class="form-control" id="formGroupExampleInput" placeholder="Заголовок записи">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Содержание записи</label>
  <textarea type="text" name="text" class="form-control" id="formGroupExampleInput4" placeholder="Содержание записи">

  </textarea>

  <script>
   setTimeout(function(){CKEDITOR.replace( 'formGroupExampleInput4' ); },400);
   </script>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Ссылка на картинку (опционально)</label>
  <input type="text" name="pictures" class="form-control" id="formGroupExampleInput2">
</div>
<input type = 'submit' class="btn btn-outline-success" value = "Add post"/>
   
     </form>
     @endsection
  </body>
</html>