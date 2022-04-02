<html>
 
  <head>
    
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
     <title>Добавление олимпиады</title>
  </head>
  
  <body>
  @extends('layouts.app')
     @section('content')
     <form action = "/olymp_create" method = "post" class="m-2">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Заголовок</label>
  <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Заголовок записи">
</div>

<div class="mb-3">

  <label for="formGroupExampleInput2" class="form-label">Про олимпиаду(кратенько)</label>
  <textarea type="text" name="about" class="form-control" id="formGroupExampleInput2"  placeholder="Содержание олимпиады на странице">

  </textarea>
  <script>
    setTimeout(function(){CKEDITOR.replace( 'formGroupExampleInput2' ); },400);
    </script>
</div>
<div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Подробности олимпиады</label>
    <textarea type="text" name="info" class="form-control" id="formGroupExampleInput1" placeholder="Подробности олимпиады в модальном окне">

  
    </textarea>
    <script>
      setTimeout(function(){CKEDITOR.replace( 'formGroupExampleInput1' ); },400);
      </script>
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Файл к олимпиаде</label>
    <input type="text" name="files" class="form-control" id="formGroupExampleInput2" placeholder="Файл к олимпиаде">
  

  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Включить олимпиаду? (1 для включения 0 для выключения)</label>
    <input type="number" name="isActive" class="form-control" id="formGroupExampleInput2" >
  </div>
  <select name="forWho" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
        <li><option class="dropdown-item" id="forWho" type="text" class="form-control " name="forWho" value="студент" required  autofocus>Студент</option></li>
      <li><option class="dropdown-item" id="forWho" type="text" class="form-control " name="forWho" value="школьник" required  autofocus>Школьник</option></li>
      <li><option class="dropdown-item" id="forWho" type="text" class="form-control " name="forWho" value="преподаватель" required  autofocus>Преподаватель</option></li>
  </ul>                       
</select>
<input type = 'submit' class="btn btn-outline-success" value = "Add olymp"/>

       </form>
     @endsection
     
  </body>
</html>