<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\{GradeController, HomeController, StudentController, SubjectController,TeacherController};
use App\Http\Controllers\Admin\{ExamController,StageController};
use App\Http\Controllers\Admin\{VideoController,FileController};
use App\Http\Controllers\GradeController as StGradeController;

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
      Route::delete('grades/delete-all',[GradeController::class,'deleteAll'])->name('grades.delete-all');
      Route::get('dashboard', [HomeController::class,'index'])->name('dashboard');
      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::resource('subjects', SubjectController::class);
      Route::delete('subjects/delete-all',[SubjectController::class,'deleteAll'])->name('subjects.delete-all');

      Route::resource('exams', ExamController::class);
      Route::resource('videos', VideoController::class);
      Route::resource('files', FileController::class);
      Route::resource('stages', StageController::class);


      Route::resource('students', StudentController::class)->only(['index', 'edit', 'update', 'destroy']);
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
  
  Route::get('grades/{id}/show', [StGradeController::class,'show'])->name('grades.show');
  Route::get('/', [StGradeController::class,'index'])->name('home');

  Route::get('/course', function () {
      return view('course-content');
  });
  Route::get('/course2', function () {
      return view('subject-cources');
  });
  Route::get('/course3', function () {
      return view('teachers');
  });
//   Route::get('/dashboard', function () {
//       return view('dashboard');
//   });
//   Route::get('/welcome', function () {
//       return view('welcome');
//   });
//->middleware(['auth', 'verified'])->name('dashboard');

});

require __DIR__.'/auth.php';
