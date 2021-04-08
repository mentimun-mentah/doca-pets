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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verify/{token}/{id}', [App\Http\Controllers\Auth\RegisterController::class,'verify']);
Route::post('/register/doctor', [App\Http\Controllers\Auth\RegisterController::class,'registerDoctor']);

Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);

Route::get('/account', [App\Http\Controllers\AccountController::class, 'index']);
Route::put('/account', [App\Http\Controllers\AccountController::class, 'updateProfile']);
Route::post('/account/avatar', [App\Http\Controllers\AccountController::class, 'updateAvatar']);
Route::put('/account/password', [App\Http\Controllers\AccountController::class, 'updatePassword']);

Route::get('/treat', [App\Http\Controllers\TreatController::class, 'index'])->name('treat');
Route::get('/treat/{slug}', [App\Http\Controllers\TreatController::class, 'show'])->name('treat');

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');

Route::get('/pet/{slug}', [App\Http\Controllers\PetsController::class, 'show'])->name('pet');

Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor');
Route::get('/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor');

Route::get('/ask', [App\Http\Controllers\AskController::class, 'index'])->name('ask');
Route::get('/ask/{id}', [App\Http\Controllers\AskController::class, 'show'])->name('ask');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::middleware(['auth'])->group(function () {
  Route::get('/user', function () {
      return Auth::user();
  });
});
