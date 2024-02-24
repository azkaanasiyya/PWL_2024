<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// //basic routing

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/world', function() {
//     return 'World';
// });

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
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::get('/articels/{article1234}', function($id) {
    return 'Halaman Artikel dengan ID '.$id;
});

// //optional parameters

// Route::get('/user/{Azka?}', function($name=null) {
//     return 'Nama saya '.$name;
// });

Route::get('/user/{name?}', function($name='John') {
    return 'Nama saya '.$name;
});

Route::get('/', [PageController::class,'index']);
Route::get('/about', [PageController::class,'about']);
Route::get('/articles/{id}', [PageController::class,'articles']);

//membuat controller
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [HomeController::class,'index']);

Route::get('/about', [AboutController::class,'about']);

Route::get('/articles/{id}', [ArticleController::class,'articles']);

//resource controller
Route::resource('photos', PhotoController::class);

// //membuat view
// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Azka']);
// });

//menampilkan view dari controller
Route::get('/greeting', [WelcomeController::class,
'greeting']);
