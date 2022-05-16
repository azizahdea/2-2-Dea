<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('home');
 });

Route :: get('/about', function(){
    return view('about', [
        "nama" => "Azizah Dea"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::resource('/contact', ContactController::class);
Auth::routes();


Route::get('/home', function(){
    return view('admin.home', [
        "title" => "Home"
    ]);
});
Route::get('/delete_contact/{id}', ContactController::class . '@destroy');
Route::get('/edit_contact/{id}', ContactController::class . '@edit');
Route::post('/update_contact', ContactController::class . '@update');



Route::resource('/contact', ContactController::class);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

