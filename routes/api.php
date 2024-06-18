<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ClasscredController; // Import the ClassController
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamScoreController;
use App\Http\Controllers\AttendanceController;


Route::middleware('auth:sanctum')->group(function () {
    // Add protected routes here
});


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/classcred', [ClasscredController::class, 'classcred']); // Define a POST route for saving class data
Route::post('/lesson', [LessonController::class, 'lesson']);
Route::get('/lessonlist', [LessonController::class, 'lessonlist']);
Route::delete('/lesson/{id}', [LessonController::class, 'deleteLesson']);
Route::get('/get-class-names', [ClasscredController::class, 'getClassNames']);
Route::get('/classes', [ClasscredController::class, 'getClasses']);
Route::get('/classesDetail/{classId}', [ClasscredController::class, 'classesDetail']);



Route::post('/users', [UserController::class, 'users']);
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users', [UserController::class, 'students']);
Route::get('/studentsDetail/{studentId}', [UserController::class, 'studentsDetail']);

Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::put('/subjects/{id}', [SubjectController::class, 'update']);
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);
Route::get('/subjects', [SubjectController::class, 'getsubjects']);
Route::get('/subjectsDetail/{studentId}', [SubjectController::class, 'subjectsDetail']);



Route::post('/exams', [ExamController::class, 'store']);
Route::get('/exams', [ExamController::class, 'index']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);

Route::post('/exam-scores', [ExamScoreController::class, 'store']);
Route::get('/exam-scores', [ExamScoreController::class, 'index']);
Route::put('/exam-scores/{id}', [ExamScoreController::class, 'update']);
Route::delete('/exam-scores/{id}', [ExamScoreController::class, 'destroy']);

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);






