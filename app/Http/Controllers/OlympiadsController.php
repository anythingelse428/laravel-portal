<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OlympiadsController extends Controller
{
    public function insertform(){
        return view('olymp_create');
     }

     public function insert(Request $request){
      $title = $request->input('title');
      $about = $request->input('about');
      $info = $request->input('info');
      $files = $request->input('files');
      $isActive = $request->input('isActive');
      $forWho = $request->input('forWho');

      DB::insert('insert into olympiads (title,about,info,files,isActive,forWho) values(?,?,?,?,?,?)',[$title, $about, $info,$files,$isActive,$forWho]);
        return view('olymp_done');
   }
   public function editFields(Request $request){
       $id=str_ireplace('editoly/','',$request->path());
       $db=DB::table('olympiads')->where('id', '=', $id);
            $olyTitle=$db->select('title')->first()->title;
            $olyAbout=DB::table('olympiads')->where('id', '=', $id)->select('about')->first()->about;
            $olyInfo=$db->select('info')->first()->info;
            $olyFiles=$db->select('files')->first()->files;
            $olyIsActive=$db->select('isActive')->first()->isActive;
            $olyForWho=$db->select('forWho')->first()->forWho;
    return view('edit_oly')->with(compact('id','olyTitle', 'olyAbout','olyInfo','olyFiles','olyIsActive','olyForWho'));
   }
   public function edit(Request $request){
    $id=str_ireplace('updateoly/','',$request->path());
    $db=DB::table('olympiads')->where('id', '=', $id);
        $UPDtitle = $request->input('title');
        $UPDabout = $request->input('about');
        $UPDinfo = $request->input('info');
        $UPDfiles = $request->input('files');
        $UPDisActive = $request->input('isActive');
        $UPDforWho = $request->input('forWho');
  $db->update(['title'=>$UPDtitle]);
    $db->update(['about'=>$UPDabout]);
    $db->update(['info'=>$UPDinfo]);
    $db->update(['files'=>$UPDfiles]);
    $db->update(['isActive'=>$UPDisActive]);
    $db->update(['forWho'=>$UPDforWho]);
  
  return view('olymp_done');

}
   public function index()
       {
           $olymp = DB::table('olympiads')->paginate(75);
   
           return view('layouts.main', ['olymplist' => $olymp]);
       }
       public function olympPost(){
         $post = DB::select('select * from olympiads');
         return view('layouts.main',['post'=>$post]);
      }
      public function destroy($id) {
         DB::delete('delete from olympiads where title = ?',[$id]);
         return view('olymp_done');
      }
      public function toggle(Request $request){
          $toggle=$request->input('toggle');
          $title=$request->input('title');
          DB::table('olympiads')->where('title', '=', $title)->update(['isActive' => $toggle]);
          return back();
      }
}
