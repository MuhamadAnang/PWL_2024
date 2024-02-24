<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
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

//get untuk mengambil nilai nya
//kalo ada view nya seperti di atas, akan mengambil isi di resources/views


//praktikum 1

// Route::get('/hello', function () {
//     return 'Hello World';
// });
   
Route::get('/world', function () {
    return 'World';
});

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

// Route::get('/about', function () {
//     return 'NIM : 2241720070 <br> Nama : Muhamad Anang Abdullah Faqih';
// });


//praktikum 2
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
}); 

// Route::get('articles/{id}', function ($id) {
//     return 'Halaman artikel dengan ID '.$id;
// });

//praktikum 3
Route::get('/user/{name?}', function ($name = null) {
    return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});


//Controlller
//Praktikum 1

// Route::get('/hello', [WelcomeController::class,'hello']);
// Route::get('/', [PageController::class,'index']);
// Route::get('/about', [PageController::class,'about']);
// Route::get('/articles/{id}', [PageController::class,'articles']);

Route::get('/', [HomeController::class,'index']);
Route::get('/about', [AboutController::class,'index']);
Route::get('/articles/{id}', [ArticlesController::class,'index']);

// Route::resource('photos', PhotoController::class);


Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

// Route::get('greeting', function () {
//     return view ('Hello', ['name' => 'Anang']);
// });


// praktikum 6
// Route::get('greeting', function () {
//     return view ('blog.Hello', ['name' => 'Anang']);
// });

// praktikum 7
Route::get('/greeting', [WelcomeController::class, 'greeting']);