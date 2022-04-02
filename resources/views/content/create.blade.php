@extends('layouts.app')
@section('content')
<form action = "{{  route('create.content')  }}" method = "post">
    
    @csrf
    <table>
       <tr>
          <td>Name</td>
          <td><input type='text' name='content_title' /></td>
       </tr>
       <tr>
          <td colspan = '2'>
             <input type = 'submit' value = "Add title"/>
          </td>
       </tr>
    </table>

 </form>
@endsection