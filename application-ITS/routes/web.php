<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\teacher\AttendanceController;
use App\Http\Controllers\teacher\TeacherController;
use App\Http\Controllers\teacher\TimetableController;



// login
Route::get('/', function () {
    return view('login.login');
})->name('login');
Route::post('/login-reg', [LoginController::class, 'login'])->name('login-reg.post');

//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


});
Route::middleware(['auth', 'role:admin'])->get('/{any}', function ($any) {
    return view('admin.dashboard');
})->where('any', '.*');

// teacher
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');

    Route::get('/teacher/getName', [TeacherController::class, 'getTeacherName'])->name('teacher.getName');
    Route::get('/teacher/t_timetable', [TimetableController::class, 'index'])->name('teacher.t_timetable');

    Route::get('/attendance/{class_id}/{date}', [AttendanceController::class, 'index']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
});

//Route::middleware(['auth', 'role:teacher'])->get('/{any}', function ($any) {
//    return view('teacher.dashboard');
//})->where('any', '.*');
