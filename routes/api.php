<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\teachingController;
use App\Http\Controllers\trainingController;
use App\Http\Controllers\userController;
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


Route::post('register', [authController::class, 'register']);
Route::post('login', [authController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [authController::class, 'logout']);
    Route::post('changepasword', [userController::class, 'changepasword']);
    Route::post('/updateSettings', [authController::class, 'updateSettings']);
    Route::get('/getUserProfile', [authController::class, 'getUserProfile']);
});

// student CRUD
Route::post('addStudent', [studentController::class, 'addstudent']);
Route::match(['get', 'post'], 'delStudent/{std_id}', [studentController::class, 'delstudent']);
ROute::post('updateStudent/{std_id}', [studentController::class, 'updatestudent']);
Route::get('studentData', [studentController::class, 'getStdData']);
// parent student data
Route::get('parentStudentData/{parent_id}', [studentController::class,  'parentStudentData']);

// parent CRUD
Route::post('addParent', [parentController::class, 'addparent']);
Route::get('parentData', [parentController::class, 'parantdata']);
Route::match(['get', 'post'], 'delParent/{parent_id}', [parentController::class, 'delparent']);
Route::post('updateParent/{parent_id}', [parentController::class, 'updateparent']);

// teacher CRUD
ROute::post('addTeacher', [teacherController::class, 'addteacher']);
Route::get('teacherData', [teacherController::class, 'teacherdata']);
Route::match(['get', 'post'], 'delTeacher/{teacher_id}', [teacherController::class, 'delTeacher']);
Route::post('updateTeacher/{teacher_id}', [teacherController::class, 'updateteacher']);

// training  CRUD
Route::post('addTraining', [trainingController::class, 'addtraining']);
Route::get('trainingData', [trainingController::class, 'trainingdata']);
Route::match(['get', 'post'], 'delTraining/{training_id}', [trainingController::class, 'deltraining']);
Route::post('updateTraining/{training_id}', [trainingController::class, 'updatetraining']);


// Courses  CRUD
Route::post('addCourse', [coursesController::class, 'addcourse']);
Route::get('courseData', [coursesController::class, 'coursedata']);
Route::match(['get', 'post'], 'delCourse/{course_id}', [coursesController::class, 'delcourse']);
Route::post('updateCourse/{course_id}', [coursesController::class, 'updatecourse']);


// teaching page filters
Route::get('filtersCourse', [teachingController::class, 'filtersCourse']);
Route::post('addTeachingData', [teachingController::class, 'addteachingata']);
Route::post('addTeachingData', [teachingController::class, 'teacherRecdata']);


// teaching data
Route::post('addTeaching', [teachingController::class, 'addteachingrecdata']);
// Route::post('addTeaching', [teachingController::class, 'addteachingdata']);
// add teacher  recording data
Route::post('addTeacherRecording', [teachingController::class, 'teacherRecdata']);
// get words from gaming
Route::get('getParentWords/{parent_id}', [teachingController::class, 'getParentWords']);
Route::get('getTeacherWords/{teacher_id}', [teachingController::class, 'getTeacherWords']);
Route::get('getAllWords', [teachingController::class, 'getAllWords']);


// get Recording Data
Route::get('getAllRecording', [teachingController::class, 'getAllRecording']);
Route::get('getTeacherRecording/{teacher_id}', [teachingController::class, 'getTeacherRec']);
// delete Recording
Route::match(['get', 'post'], 'deleteRecording/{id}', [teachingController::class, 'delRecording']);
