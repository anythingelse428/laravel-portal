<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Redirect;
use DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('home');
    }
    public function editFields(Request $request){
        $allOlymp=DB::table('olympiads')->pluck('title');
        $id=str_ireplace('editprofile/','',$request->path());
        $db=DB::table('users')->where('id', '=', $id);
             $name=$db->select('name')->first()->name;
             $sname=$db->select('sname')->first()->sname;
             $otchestvo=$db->select('otchestvo')->first()->otchestvo;
             $whoIs=$db->select('whoIs')->first()->whoIs;
             $spec=$db->select('spec')->first()->spec;
             $avatar=$db->select('avatar')->first()->avatar;
             $mail=$db->select('email')->first()->email;
             $phone=$db->select('phone')->first()->phone;
             $birth=$db->select('birth')->first()->birth;
             $education_org=$db->select('education_org')->first()->education_org;

     return view('edit_user')->with(compact('id','name', 'sname','otchestvo','whoIs','spec','avatar','mail','phone','birth','education_org','allOlymp'));
    }
    public function edit(Request $request){
     $id=str_ireplace('updateprofile/','',$request->path());
     $db=DB::table('users')->where('id', '=', $id);
         $updName = $request->input('name');
        //  dd($updName);
         $updSname = $request->input('sname');
         $UPDotchestvo = $request->input('otchestvo');
         $UPDwhoIs = $request->input('whoIs');
         $UPDspec = $request->input('spec');
         $UPDavatar = $request->input('avatar');
         $UPDmail = $request->input('mail');
         $UPDphone = $request->input('phone');
         $UPDbirth = $request->input('birth');
         $UPDavatar = $request->input('avatar');
         $UPDeducation_org = $request->input('education_org');


    $db->update(['name'=>$updName]);
     $db->update(['sname'=>$updSname]);
     $db->update(['otchestvo'=>$UPDotchestvo]);
     $db->update(['whoIs'=>$UPDwhoIs]);
     $db->update(['spec'=>$UPDspec]);
     $db->update(['avatar'=>$UPDavatar]);
     $db->update(['email'=>$UPDmail]);
     $db->update(['phone'=>$UPDphone]);
     $db->update(['birth'=>$UPDbirth]);
     $db->update(['education_org'=>$UPDeducation_org]);
 
   return view('olymp_done');
 
 }
 public function  deleteOlymp(Request $request){
    $olympNid=explode('/',str_ireplace('deleteolymp/','',urldecode($request->path())));
    $db=DB::table('users')->where('id', '=', $olympNid[0])->select('curr_olymp')->first()->curr_olymp;
    DB::table('users')->where('id', '=', $olympNid[0])->select('curr_olymp')->update(array('curr_olymp'=>str_ireplace(array($olympNid[1].'+',$olympNid[1]),'',$db)));
  
    return redirect()->route('home');
 }
    public function try(Request $request){           
                $directory =$request->user()->curr_olymp.'/'.$request->user()->name.'@'.$request->user()->email;
                $files = Storage::disk('public')->files($directory);
                $url=[];
                $j=0;
                for ($j=0;$j<count($files);$j++){
                    array_push($url, Storage::url($files[$j]));
                }
                    $test=(object)[
                        'fName'=>$files,
                        'fUrl'=>$url,
                    ];
                    return view('home', compact('test'));
        }
    
}
