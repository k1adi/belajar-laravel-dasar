<?php

use App\Http\Controllers\HelloController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/halo', 'hello', ['name' => 'Rizki']);
Route::get('/controller/halo/{name}', [App\Http\Controllers\HelloController::class, 'index'])->name('controller.hello');

Route::get('/halo-lagi', function() {
    return view('hello', ['name' => 'Rizki Adi']);
});
Route::get('/controller/halo-lagi', [App\Http\Controllers\HelloController::class, 'world'])->name('controller.world');

Route::get('/hello-world', function() {
    return view('hello.world', ['name' => 'Rizki Adi']);
});

Route::get('kiadi', function() {
    return 'Rizki Adi Prisma';
});

Route::redirect('/rizki', '/kiadi');

Route::fallback(function() {
    return 'error 404, page not found';
});