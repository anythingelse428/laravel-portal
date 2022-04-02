<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostInsertController extends Controller
{
    public function insertform(){
        return view('post_create');
     }

     public function insert(Request $request){
      $title = $request->input('title');
      $text = $request->input('text');
      $pictures = $request->input('pictures');
      DB::insert('insert into contentmainpage (title,text,pictures) values(?,?,?)',[$title, $text, $pictures]);
      return view('olymp_done');
      
   }
   public function editFields(Request $request){
    $id=str_ireplace('editpost/','',$request->path());
    $db=DB::table('contentmainpage')->where('id', '=', $id);
         $postTitle=$db->select('title')->first()->title;
         $postText=$db->select('text')->first()->text;
         $postPicture=$db->select('pictures')->first()->pictures;
    return view('edit_post')->with(compact('id','postTitle', 'postText','postPicture'));
}
public function edit(Request $request){
 $id=str_ireplace('updatepost/','',$request->path());
 $db=DB::table('contentmainpage')->where('id', '=', $id);
     $UPDtitle = $request->input('title');
     $UPDtext = $request->input('text');
     $UPDpicture = $request->input('pictures');

$db->update(['title'=>$UPDtitle]);
 $db->update(['text'=>$UPDtext]);
 $db->update(['pictures'=>$UPDpicture]);
return view('olymp_done');
}
   public function index()
       {
           $content = DB::table('contentmainpage')->paginate(75);
   
           return view('layouts.main', ['welcomelist' => $content]);
       }
       public function deletePost(){
         $post = DB::select('select * from contentmainpage');
         return view('layouts.main',['post'=>$post]);
      }
      public function destroy($id) {
     DB::delete('delete from contentmainpage where id = ?',[$id]);
         return view('post_delete');
      }
}
