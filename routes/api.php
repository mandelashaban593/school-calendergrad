<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ClasscredController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamScoreController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;

Route::post('/register', [UserController::class, 'users']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout']);
Route::post('/classcred', [ClasscredController::class, 'classcred']);
Route::post('/updatelesson', [LessonController::class, 'updatelesson']);
Route::post('/savelesson', [LessonController::class, 'savelesson']);
Route::get('/lessonlist', [LessonController::class, 'lessonlist']);
Route::get('/lesscalendlist', [LessonController::class, 'lesscalendlist']);
Route::delete('/lesson/{id}', [LessonController::class, 'deleteLesson']);
Route::get('/get-lesson/{id}', [LessonController::class, 'getLesson']);

Route::get('/get-class-names', [ClasscredController::class, 'getClassNames']);
Route::get('/classes', [ClasscredController::class, 'getClasses']);
Route::get('/classesDetail/{classId}', [ClasscredController::class, 'classesDetail']);

Route::post('/users', [UserController::class, 'users']);
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/studentsDetail/{studentId}', [UserController::class, 'studentsDetail']);
Route::get('/get-teachers', [UserController::class, 'getTeachers']);

Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::put('/subjects/{id}', [SubjectController::class, 'update']);
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);
Route::get('/subjectsDetail/{studentId}', [SubjectController::class, 'subjectsDetail']);

Route::post('/exams', [ExamController::class, 'store']);
Route::get('/exams', [ExamController::class, 'index']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);

Route::post('/exam-scores', [ExamScoreController::class, 'store']);
Route::get('/exam-scores', [ExamScoreController::class, 'index']);
Route::put('/exam-scores/{id}', [ExamScoreController::class, 'update']);
Route::delete('/exam-scores/{id}', [ExamScoreController::class, 'destroy']);
Route::post('/generate-report', [ExamScoreController::class, 'generateReport']);

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);

Route::get('/classes', [ClassController::class, 'index']);
Route::post('/classes', [ClassController::class, 'store']);
Route::put('/classes/{classModel}', [ClassController::class, 'update']);
Route::delete('/classes/{classModel}', [ClassController::class, 'destroy']);
