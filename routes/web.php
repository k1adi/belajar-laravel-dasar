<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Tests\Feature\CookieControllerTest;

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

// Route prefix
Route::prefix('input', function(){
    Route::post('/type', [InputController::class, 'inputType']);
    Route::post('/filter/only', [InputController::class, 'filterOnly']);
    Route::post('/filter/except', [InputController::class, 'filterExcept']);
    Route::post('/filter/merge', [InputController::class, 'filterMerge']);
});

// Route prefix
Route::prefix('/input/hello', function(){
    Route::get('/', [InputController::class, 'hello']);
    Route::post('/', [InputController::class, 'hello']);
    Route::post('/first', [InputController::class, 'firstName']);
    Route::post('/json', [InputController::class, 'allInput']);
    Route::post('/array', [InputController::class, 'helloArray']);
});


// Example when not using csrftoken middleware, that provide as default from Laravel
Route::post('/file/upload', [FileController::class, 'upload'])
    ->withoutMiddleware([VerifyCsrfToken::class]);

// Route prefix
Route::prefix('/response')->group(function() {
    Route::get('/halo', [ResponseController::class, 'response']);
    Route::get('/header', [ResponseController::class, 'header']);
});

// Route prefix
Route::prefix('/response/type')->group(function() {
    Route::get('/view', [ResponseController::class, 'response_view']);
    Route::get('/json', [ResponseController::class, 'response_json']);
    Route::get('/file', [ResponseController::class, 'response_file']);
    Route::get('/download', [ResponseController::class, 'response_download']);
});

// Multiple route group prefix and controller
Route::prefix('cookie')->controller(CookieController::class)->group(function() {
    Route::get('/set', 'createCookie');
    Route::get('/get', 'getCookie');
    Route::get('/clear', 'clearCookie');
});

// Route prefix
Route::prefix('redirect')->group(function() {
    Route::get('/to', [RedirectController::class, 'redirectTo']);
    Route::get('/from', [RedirectController::class, 'redirectFrom']);
    Route::get('/name', [RedirectController::class, 'redirectName']);
    Route::get('/name/{name}', [RedirectController::class, 'redirectHello'])->name('redirect.hello');
    Route::get('/action', [RedirectController::class, 'redirectAction']);
    Route::get('/away', [RedirectController::class, 'redirectAway']);
});

// Route middleware
Route::middleware(['contoh:Prisma,401'])->group(function() {
    Route::get('/middleware/api', function() {
        return 'OK';
    });
    
    Route::get('/middleware/group', function() {
        return 'GROUP';
    });
});

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'submitForm']);