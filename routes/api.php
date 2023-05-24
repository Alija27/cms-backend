<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\SemesterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication
Route::post("login", [\App\Http\Controllers\API\Auth\AuthController::class, "login"]);
Route::post("register", [\App\Http\Controllers\API\Auth\AuthController::class, "register"]);

//Students
Route::resource("students", \App\Http\Controllers\API\StudentController::class);

//Department
Route::resource("departments", \App\Http\Controllers\API\DepartmentController::class);

//Course
Route::resource("courses", \App\Http\Controllers\API\CourseController::class);

//Semester
Route::resource("semesters", \App\Http\Controllers\API\SemesterController::class);

//Batch
Route::resource("batches", \App\Http\Controllers\API\BatchController::class);

//Subject
Route::resource("subjects", \App\Http\Controllers\API\SubjectController::class);

//Teacher
Route::resource("teachers", \App\Http\Controllers\API\TeacherController::class);
