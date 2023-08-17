<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\BookController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get("getuser",[\App\Http\Controllers\API\Auth\AuthController::class,"getuser"]);
    Route::post("logout", [\App\Http\Controllers\API\Auth\AuthController::class, "logout"]);
});

//Authentication
Route::post("login", [\App\Http\Controllers\API\Auth\AuthController::class, "login"]);
Route::post("register", [\App\Http\Controllers\API\Auth\AuthController::class, "register"]);



//Users
Route::resource("users",\App\Http\Controllers\API\UserController::class);

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

//Book
Route::resource("books", \App\Http\Controllers\API\BookController::class);

//BookTransaction
Route::resource("book-transactions", \App\Http\Controllers\API\BookTransactionController::class);
Route::put("booktransactions/status/{bookTransaction}", [\App\Http\Controllers\API\BookTransactionController::class,"updateStatus"]);

//Account
Route::resource("accounts", \App\Http\Controllers\API\AccountController::class);

//Payment   
Route::resource("payments", \App\Http\Controllers\API\PaymentController::class);
