<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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
Route::get('/controller/halo/request', [App\Http\Controllers\HelloController::class, 'request'])->name('controller.request');
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

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'firstName']);
Route::post('/input/hello/json', [InputController::class, 'allInput']);
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
Route::post('/input/type', [InputController::class, 'inputType']);
Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);
Route::post('/input/filter/merge', [InputController::class, 'filterMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);
