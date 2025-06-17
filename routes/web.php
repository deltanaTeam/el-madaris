<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{GradeController,SubjectController,TeacherController};

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

  Route::prefix('admin')->name('admin.')->group(function () {
      Route::resource('grades', GradeController::class);
      Route::resource('subjects', SubjectController::class);
      Route::resource('teachers', TeacherController::class)->only(['index', 'edit', 'update', 'destroy']);
      Route::post('teachers/{user}/approve', [TeacherController::class, 'approve'])->name('teachers.approve');
      Route::post('teachers/{user}/reject', [TeacherController::class, 'reject'])->name('teachers.reject');
  });



  ///////////////////////////////////////////////////////////////////////////////////////
  Route::middleware('auth')->group(function () {
      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  });


  Route::get('/', function () {
      return view('index');
  });
  Route::get('/dashboard', function () {
      return view('dashboard');
  });
  Route::get('/welcome', function () {
      return view('welcome');
  });
//->middleware(['auth', 'verified'])->name('dashboard');

});

require __DIR__.'/auth.php';
