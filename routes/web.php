<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EntrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/', function () {
//     return view('index');
// })->name('home');


Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('jwt.verify')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('jwt.verify')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.home');
    Route::get('view/{id}', [UserController::class, 'view'])->name('user.view');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('save', [UserController::class, 'save'])->name('user.save');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});


Route::middleware('jwt.verify')->prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.home');
    Route::get('view/{id}', [StudentController::class, 'view'])->name('student.view');
    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::post('save', [StudentController::class, 'save'])->name('student.save');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update', [StudentController::class, 'update'])->name('student.update');
    Route::get('delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
});

Route::middleware('jwt.verify')->prefix('teacher')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.home');
    Route::get('view/{id}', [TeacherController::class, 'view'])->name('teacher.view');
    Route::get('create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('save', [TeacherController::class, 'save'])->name('teacher.save');
    Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('update', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
});

Route::middleware('jwt.verify')->prefix('course')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course.home');
    Route::get('view/{id}', [CourseController::class, 'view'])->name('course.view');
    Route::get('create', [CourseController::class, 'create'])->name('course.create');
    Route::post('save', [CourseController::class, 'save'])->name('course.save');
    Route::get('edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('update', [CourseController::class, 'update'])->name('course.update');
    Route::get('delete/{id}', [CourseController::class, 'delete'])->name('course.delete');
});

Route::middleware('jwt.verify')->prefix('batches')->group(function () {
    Route::get('/', [BatchController::class, 'index'])->name('batches.home');
    Route::get('view/{id}', [BatchController::class, 'view'])->name('batches.view');
    Route::get('create', [BatchController::class, 'create'])->name('batches.create');
    Route::post('save', [BatchController::class, 'save'])->name('batches.save');
    Route::get('edit/{id}', [BatchController::class, 'edit'])->name('batches.edit');
    Route::post('update', [BatchController::class, 'update'])->name('batches.update');
    Route::get('delete/{id}', [BatchController::class, 'delete'])->name('batches.delete');
});

Route::middleware('jwt.verify')->prefix('entrollment')->group(function () {
    Route::get('/', [EntrollmentController::class, 'index'])->name('entrollment.home');
    Route::get('view/{id}', [EntrollmentController::class, 'view'])->name('entrollment.view');
    Route::get('create', [EntrollmentController::class, 'create'])->name('entrollment.create');
    Route::post('save', [EntrollmentController::class, 'save'])->name('entrollment.save');
    Route::get('edit/{id}', [EntrollmentController::class, 'edit'])->name('entrollment.edit');
    Route::post('update', [EntrollmentController::class, 'update'])->name('entrollment.update');
    Route::get('delete/{id}', [EntrollmentController::class, 'delete'])->name('entrollment.delete');
});


Route::middleware('jwt.verify')->prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payment.home');
    Route::get('view/{id}', [PaymentController::class, 'view'])->name('payment.view');
    Route::get('create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('save', [PaymentController::class, 'save'])->name('payment.save');
    Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('update', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
});
