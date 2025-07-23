<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['auth'])->group(function () {
    Route::resource('doctors', DoctorController::class);
    Route::resource('students', StudentController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('courses', CourseController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('students', StudentController::class);
Route::get('/Doctor/{id}', [DoctorController::class, 'show'])->name('Doctor.show');
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/students/{id}', [StudentController::class, 'show'])
    ->middleware('auth')
    ->name('students.show');

// Route::get('/students/{id}', [StudentController::class, 'index'])
//     ->middleware('auth')
//     ->name('students.index');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');




Route::get('/enroll', [EnrollController::class, 'index'])->name('enroll.index');
Route::post('/enroll/{course}', [EnrollController::class, 'store'])->name('enroll.store');

Route::post('/courses/{course}/enroll', [EnrollController::class, 'store'])->name('courses.enroll');

Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->middleware('auth')->name('profile');

require __DIR__.'/auth.php';
