<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);

Route::patch(
    'students/{student}/status',
    [StudentController::class, 'updateStatus']
)->name('students.update-status');
