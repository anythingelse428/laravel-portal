<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use ZipArchive;

class GetZip extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetZip(Request $request)
    {
        if($request->has('download')) {
        	// Define Dir Folder
        	$public_dir=public_path();
        	// Zip File Name
            $zipFileName = 'AllDocuments.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            	// Add File in ZipArchive
                $zip->addFile("storage\app\public\CAD-разработка\dasdasd@sdasdsad@sdasdsad.com\[3431]OLYMPproto.png",'file_name');
                // Close ZipArchive     
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($filetopath,$zipFileName,$headers);
            }
        }
        return view('createZip');
    }
}
