<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Http\Request;
use Redirect;
use URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function show()
    {
        return view('files.upload');
    }

    public function upload(Request $request)
    {
        $directory = $request->user()->curr_olymp . '/' . $request->user()->name . '@' . $request->user()->email;
        foreach ($request->file('image') as $file) {
            $mime_type = $file->getClientMimeType();


            $filename = $file->getClientOriginalName();
            $isRar = substr($filename, -3);
            $file->store($directory, 'public');
            $rand = rand(1, 9999);
            $file = rename($file, "storage/" . $directory . '/' . '[' . $rand . ']' . $filename);
            $files = Storage::disk('public')->files($directory);
            $filesLngth = count($files);
            for ($i = 0; $i < $filesLngth; $i++) {
                if (stripos($files[$i], '[')) {
                    echo '';
                } else {
                    unlink("storage/" . $files[$i]);
                }
            }
        }
        $test = implode($files);
    }

    public function NEWupload(Request $request)
    {
        $olympName = str_ireplace('loadFileFor/', '', urldecode($request->path())); //get olymp name from path (we will use this for create directories)

        foreach ($request->file('image') as $files) {
            $userFileName = $files->getClientOriginalName();
            $file = $files->storeAs($olympName . '/' . $request->user()->email, '[' . rand(0, 9999) . ']' . $userFileName, 'public'); //save file with random prefix in public/storage/olymp_name/user_mail/

        }
        return redirect()->route('home');
    }



    public function getUserFiles(Request $request)
    {
        $mail = str_replace('getUserFiles/', '', $request->path());
        $olymps = explode("+", DB::table('users')->where('email', '=', $mail)->select('curr_olymp')->first()->curr_olymp); //olymps store as string olymp1+olymp2+... 
        $urls = [];
        foreach ($olymps as $olymp){
        $dir = $olymp . '/' . $mail;
        // dd($olymps);
        $path = Storage::disk('public')->files($dir);
        for ($i = 0; $i < count($path); $i++) {
            array_push($urls, Storage::url($path[$i]));
        }
    }
        return view('files.ufiles')->with(compact('urls'));
    }
    public function getAllFiles(Request $request)
    {

        $whatOlymp = str_replace('allfiles/', '', urldecode($request->path()));

        $OlympDir = Storage::disk('public')->allFiles($whatOlymp . '/');
        $j = 0;
        $AllFilesOlymp = [];
        for ($j; $j < count($OlympDir); $j++) {
            array_push($AllFilesOlymp, Storage::url($OlympDir[$j]));
        }
        return view('files.getAll')->with(compact('AllFilesOlymp', 'whatOlymp'));
    }

    public function getZip(Request $request)
    {
        $path = str_replace('getZip/', '', urldecode($request->path()));
        $files = Storage::disk('public')->allFiles($path . '/');
        // dd($files);
        $rpath = str_replace("\\", "/", public_path());
        $zip = new ZipArchive();
        $zip_name = time() . ".zip";
        $zip->open($zip_name, ZipArchive::CREATE);
        $zip->addFile($files[1]);
        $zip->close();
        dd($zip);
    }
}
