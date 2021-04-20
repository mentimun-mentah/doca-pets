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

Route::get('/ask', [App\Http\Controllers\AskController::class, 'index'])->name('ask');
Route::get('/ask/{id}', [App\Http\Controllers\AskController::class, 'show'])->name('ask');

/* COMMENT FUNCTION */
Route::get('/comment/all-comment', [App\Http\Controllers\CommentController::class, 'getAllComment']);
/* REPLIES FUNCTION */
Route::get('/replies/all-replies/{id}', [App\Http\Controllers\RepliesController::class, 'getAllReplies']);

Route::middleware(['user.basic'])->group(function () {
  /* COMMENT FUNCTION */
  Route::post('/comment/create', [App\Http\Controllers\CommentController::class, 'create']);

  /* LIKE FUNCTION */
  Route::post('/replies/like/{id}', [App\Http\Controllers\RepliesController::class, 'likeReplies']);
  Route::get('/replies/check-like/{id}', [App\Http\Controllers\RepliesController::class, 'checkLikeReplies']);
});

Route::middleware(['doctor'])->group(function () {
  /* REPLIES FUNCTION */
  Route::post('/replies/create/{id}', [App\Http\Controllers\RepliesController::class, 'create']);

  /* DOCTOR FUNCTION */
  Route::get('/doctor/profile', [App\Http\Controllers\DoctorController::class, 'profile']);
  Route::post('/doctor/profile/update', [App\Http\Controllers\DoctorController::class, 'updateProfile']);
});

Route::get('/doctor/all-doctor', [App\Http\Controllers\DoctorController::class, 'allDoctorApprove']);
Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor');
Route::get('/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor');

/* PET FUNCTION */
Route::get('/admin/pet/all-pet', [App\Http\Controllers\PetsController::class, 'getAllPet'])->name('pet.public');
/* DOCTOR FUNCTION */
Route::get('/admin/doctor/all-doctor', [App\Http\Controllers\DoctorController::class, 'getAllDoctor'])
  ->name('doctor.public');
/* NEWS FUNCTION */
Route::get('/admin/news/all-news', [App\Http\Controllers\NewsController::class, 'getAllNews'])->name('news.public');
/* TREAT FUNCTION */
Route::get('/admin/treat/all-treat', [App\Http\Controllers\TreatController::class, 'getAllTreat'])->name('treat.public');

Route::middleware(['admin'])->group(function () {
  /* ADMIN ROUTE VIEW */
  Route::get('/admin/list-doctor', [App\Http\Controllers\AdminController::class, 'listDoctor'])->name('admin.listdoctor');

  Route::get('/admin/add-pet', [App\Http\Controllers\AdminController::class, 'addPet'])->name('admin.addpet');
  Route::get('/admin/all-pet', [App\Http\Controllers\AdminController::class, 'allPet'])->name('admin.allpet');
  Route::get('/admin/change-pet/{id}', [App\Http\Controllers\AdminController::class, 'changePet'])
    ->name('admin.changepet')
    ->where('id', '[0-9]+');

  Route::get('/admin/add-news', [App\Http\Controllers\AdminController::class, 'addNews'])->name('admin.addnews');
  Route::get('/admin/all-news', [App\Http\Controllers\AdminController::class, 'allNews'])->name('admin.allnews');
  Route::get('/admin/change-news/{id}', [App\Http\Controllers\AdminController::class, 'changeNews'])
    ->name('admin.changenews')
    ->where('id', '[0-9]+');

  Route::get('/admin/add-treat', [App\Http\Controllers\AdminController::class, 'addTreat'])->name('admin.addtreat');
  Route::get('/admin/all-treat', [App\Http\Controllers\AdminController::class, 'allTreat'])->name('admin.alltreat');
  Route::get('/admin/change-treat/{id}', [App\Http\Controllers\AdminController::class, 'changeTreat'])
    ->name('admin.changetreat')
    ->where('id', '[0-9]+');

  /* PET FUNCTION */
  Route::post('/admin/pet/create', [App\Http\Controllers\PetsController::class, 'create'])->name('pet.private');
  Route::delete('/admin/pet/delete/{id}', [App\Http\Controllers\PetsController::class, 'delete'])->name('pet.private');
  Route::post('/admin/pet/update', [App\Http\Controllers\PetsController::class, 'update'])->name('pet.private');

  /* DOCTOR FUNCTION */
  Route::put('/admin/doctor/accept/{id}', [App\Http\Controllers\DoctorController::class, 'acceptDoctor'])
    ->name('doctor.private')
    ->where('id', '[0-9]+');
  Route::put('/admin/doctor/reject/{id}', [App\Http\Controllers\DoctorController::class, 'rejectDoctor'])
    ->name('doctor.private')
    ->where('id', '[0-9]+');

  /* NEWS FUNCTION */
  Route::post('/admin/news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.private');
  Route::delete('/admin/news/delete/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('news.private');
  Route::post('/admin/news/update', [App\Http\Controllers\NewsController::class, 'update'])->name('news.private');

  /* TREAT FUNCTION */
  Route::post('/admin/treat/create', [App\Http\Controllers\TreatController::class, 'create'])->name('treat.private');
  Route::delete('/admin/treat/delete/{id}', [App\Http\Controllers\TreatController::class, 'delete'])->name('treat.private');
  Route::post('/admin/treat/update', [App\Http\Controllers\TreatController::class, 'update'])->name('treat.private');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/user', function () {
      return Auth::user();
  });
});
