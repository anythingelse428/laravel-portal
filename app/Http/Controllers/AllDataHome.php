<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
// use Illuminate\Http\File;
use Redirect;
use Illuminate\Support\Facades\Storage;


class AllDataHome extends Controller
{


    public function index(Request $request)
    {
        $name = $request->user()->name;
        $mail = $request->user()->email;
        $DBuser = DB::table('users')->where('email', '=', $mail);
        $sname = $DBuser->select('sname')->first()->sname;
        $phone = $DBuser->select('phone')->first()->phone;
        $birth = $DBuser->select('birth')->first()->birth;
        $education_org = $DBuser->select('education_org')->first()->education_org;
        $otchestvo = $DBuser->select('otchestvo')->first()->otchestvo;
        $whoIs = $DBuser->select('whoIs')->first()->whoIs;
        $spec = $DBuser->select('spec')->first()->spec;
        $avatar = $DBuser->select('avatar')->first()->avatar;
        $id = $DBuser->select('id')->first()->id;
        $allOlymp = DB::table('olympiads')->pluck('title');
        $userAllOlymp = explode("+", DB::table('users')->where('email', '=', Auth::user()->email)->select('curr_olymp')->first()->curr_olymp);
        if (count($userAllOlymp) > 1) {
            foreach ($userAllOlymp as $key => $item) {
                if ($item == "") {
                    unset($userAllOlymp[$key]);
                }
            }
        }


        //Work with downloading files

        $directory = [];
        $url = [];
        $files = [];

        for ($a = 0; $a < count($userAllOlymp); $a++) {
            array_push($directory, $userAllOlymp[$a] . '/' . $request->user()->email); //get array of user directories 
        }
        for ($k = 0; $k < count($directory); $k++) {
            $files = Storage::disk('public')->files($directory[$k]); //get files from user directories
            for ($j = 0; $j < count($files); $j++) {
                array_push($url, Storage::url($files[$j])); //get URIs for download file
            }
        }
        $test = (object)[
            'fName' => $files,
            'fUrl' => $url,
        ];
        $userOlymp = DB::table('users')->where('email', '=', Auth::user()->email)->select('curr_olymp')->first()->curr_olymp;


        return view('home')->with(compact('userOlymp', 'test', 'name', 'sname', 'phone', 'birth', 'education_org', 'otchestvo', 'whoIs', 'spec', 'mail', 'allOlymp', 'avatar', 'id', 'userAllOlymp'));
    }
}
