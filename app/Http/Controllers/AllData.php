<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllData extends Controller
{
    public function index()
       {
           $olymp = DB::table('olympiads')->paginate(75);
           $content = DB::table('contentmainpage')->paginate(75);
        //    dd(Auth::guest());
           if(Auth::guest()){
               $userWho = [];
           }
           else{
            $userWho = DB::table('users')->select('whoIs')->where('email', Auth::user()->email)->first()->whoIs;

           }
           return view('layouts.main')->with(compact('olymp', 'content','userWho'));
       }
       public function test(){
           return DB::table('olympiads')->paginate(75);
       }
   
}
