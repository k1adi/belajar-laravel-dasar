<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\VerifyCsrfToken;
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

// Example when not using csrftoken middleware, that provide as default from Laravel
Route::post('/file/upload', [FileController::class, 'upload'])
    ->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/response/halo', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);
Route::get('/response/type/view', [ResponseController::class, 'response_view']);
Route::get('/response/type/json', [ResponseController::class, 'response_json']);
Route::get('/response/type/file', [ResponseController::class, 'response_file']);
Route::get('/response/type/download', [ResponseController::class, 'response_download']);

Route::get('/cookie/set', [CookieController::class, 'createCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);

Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);
Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/name', [RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])->name('redirect.hello');
Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);
Route::get('/redirect/away', [RedirectController::class, 'redirectAway']);

Route::get('/middleware/api', function() {
    return 'OK';
})->middleware(['contoh:Prisma,401']);

Route::get('/middleware/group', function() {
    return 'GROUP';
})->middleware(['prisma']);