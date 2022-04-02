<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function upload(Request $request){
        $path=$request->file('image')->store('uploads', 'public');
        return view('files.upload', ['path'=>$path]);
    }
}
