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
Route::get('/doctor/profile', [App\Http\Controllers\DoctorController::class, 'profile']);
Route::get('/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor');

Route::get('/ask', [App\Http\Controllers\AskController::class, 'index'])->name('ask');
Route::get('/ask/{id}', [App\Http\Controllers\AskController::class, 'show'])->name('ask');

/* ADMIN ROUTE VIEW */
Route::get('/admin/list-doctor', [App\Http\Controllers\AdminController::class, 'listDoctor'])->name('admin.listdoctor');
Route::get('/admin/add-pet', [App\Http\Controllers\AdminController::class, 'addPet'])->name('admin.addpet');
Route::get('/admin/all-pet', [App\Http\Controllers\AdminController::class, 'allPet'])->name('admin.allpet');
Route::get('/admin/change-pet/{id}', [App\Http\Controllers\AdminController::class, 'changePet'])
  ->name('admin.changepet')
  ->where('id', '[0-9]+');

/* PET FUNCTION */
Route::post('/admin/pet/create', [App\Http\Controllers\PetsController::class, 'create'])->name('pet.private');
Route::get('/admin/pet/all-pet', [App\Http\Controllers\PetsController::class, 'getAllPet'])->name('pet.public');
Route::delete('/admin/pet/delete/{id}', [App\Http\Controllers\PetsController::class, 'delete'])->name('pet.private');
Route::post('/admin/pet/update', [App\Http\Controllers\PetsController::class, 'update'])->name('pet.private');

/* DOCTOR FUNCTION */
Route::get('/admin/doctor/all-doctor', [App\Http\Controllers\DoctorController::class, 'getAllDoctor'])
  ->name('doctor.public');
Route::put('/admin/doctor/accept/{id}', [App\Http\Controllers\DoctorController::class, 'acceptDoctor'])
  ->name('doctor.private')
  ->where('id', '[0-9]+');
Route::put('/admin/doctor/reject/{id}', [App\Http\Controllers\DoctorController::class, 'rejectDoctor'])
  ->name('doctor.private')
  ->where('id', '[0-9]+');

/*
  /pet/create
  /pet/all-pet
  /pet/get-pet/{id}
  /pet/update/{id}
  /pet/delete/{id}
*/

Route::middleware(['auth'])->group(function () {
  Route::get('/user', function () {
      return Auth::user();
  });
});
