<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\AllData::class, 'index'])->name('welcome');

Route::post('/choose',[App\Http\Controllers\UserController::class, 'choose'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\AllDataHome::class, 'index'])->name('home')->middleware('auth');


Route::view('/files/done', [App\Http\Controllers\FilesController::class, 'show'])->name('loaded')->middleware('auth');

Route::post('/files/example', [App\Http\Controllers\FilesController::class, 'upload'])->name('files.upload')->middleware('auth');
Route::post('/loadFileFor/{name}', [App\Http\Controllers\FilesController::class, 'NEWupload'])->middleware('auth');

Route::get('editprofile/{id}',[App\Http\Controllers\HomeController::class, 'editFields'])->middleware('auth');
Route::post('updateprofile/{id}',[App\Http\Controllers\HomeController::class, 'edit'])->middleware('auth');
Route::get('/deleteOlymp/{id}/{olympName}',[App\Http\Controllers\HomeController::class, 'deleteOlymp'])->middleware('auth');



Route::group(['middleware' => 'role:Admin'], function() {

    Route::get('allusers', [App\Http\Controllers\UserController::class, 'index'])->name('allusers')->middleware('auth');
    Route::get('insert',[App\Http\Controllers\PostInsertController::class, 'insertform'])->name('insert')->middleware('auth');
    Route::post('create',[App\Http\Controllers\PostInsertController::class, 'insert'])->middleware('auth');
    Route::get('delete-records',[App\Http\Controllers\PostInsertController::class, 'deletePost'])->middleware('auth');
    Route::get('delete/{id}',[App\Http\Controllers\PostInsertController::class, 'destroy'])->middleware('auth');
    Route::get('editpost/{id}',[App\Http\Controllers\PostInsertController::class, 'editFields'])->middleware('auth');
    Route::post('updatepost/{id}',[App\Http\Controllers\PostInsertController::class, 'edit'])->middleware('auth');

    Route::post('toggle',[App\Http\Controllers\OlympiadsController::class, 'toggle'])->middleware('auth');
    Route::get('olymp_insert',[App\Http\Controllers\OlympiadsController::class, 'insertform'])->name('olymp_insert')->middleware('auth');
    Route::post('olymp_create',[App\Http\Controllers\OlympiadsController::class, 'insert'])->middleware('auth');
    Route::get('delete-olymp',[App\Http\Controllers\OlympiadsController::class, 'deletePost'])->middleware('auth');
    Route::get('deleteoly/{id}',[App\Http\Controllers\OlympiadsController::class, 'destroy'])->middleware('auth');
    Route::get('editoly/{id}',[App\Http\Controllers\OlympiadsController::class, 'editFields'])->middleware('auth');
    Route::post('updateoly/{id}',[App\Http\Controllers\OlympiadsController::class, 'edit'])->middleware('auth');


    Route::get('getUserFiles/{id}',[App\Http\Controllers\FilesController::class, 'getUserFiles'])->middleware('auth');
    Route::get('allfiles/{olymp}',[App\Http\Controllers\FilesController::class, 'getAllFiles'])->middleware('auth');
    Route::get('getZip/{olymp}',[App\Http\Controllers\FilesController::class, 'getZip'])->middleware('auth');

 });
