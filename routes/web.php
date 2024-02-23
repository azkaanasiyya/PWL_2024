<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//basic routing

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function() {
    return 'World';
});

Route::get('/', function() {
    return 'Selamat Datang';
});

Route::get('/about', function() {
    return 'NIM: 2241720157 <br> Nama: Azka Anasiyya Haris';
});

//route parameters

Route::get('/user/{Azka}', function($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post1}/comments/{comment5}', function
($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-1: ".$commentId;
});

Route::get('/articels/{article1234}', function($id) {
    return 'Halaman Artikel dengan ID '.$id;
});

//optional parameters

Route::get('/user/{Azka?}', function($name=null) {
    return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function($name='John') {
    return 'Nama saya '.$name;
});

