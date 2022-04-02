<?php

namespace App\Http\Controllers;
use App\Models;
use URL;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->paginate(75);
        // $haveFiles = Storage::disk('public')->files($directory);
        return view('users.info', ['users' => $users]);
        
    }

    public function choose(Request $request){

        $olympiad = $request->input('pick');
        $check =DB::table('users')->where('email', '=', Auth::user()->email)->select('curr_olymp')->first()->curr_olymp;
        if(strpos($check,$olympiad)!==false){
            return view('already');
        }
        else{
            if  ($check!==""){
                DB::table('users')->where('email', '=', Auth::user()->email)->update(['curr_olymp' => $olympiad.'+'.$check]);
            }
            else {
                DB::table('users')->where('email', '=', Auth::user()->email)->update(['curr_olymp' => $olympiad]);
            }
            return redirect()->route('home');      
         
    }
}
}