<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPackageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherStudentController;
use App\Models\Student_Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', 'HomeController@login')->name('logIn');


Route::post('login/store', 'HomeController@store')->name('login.store');

// Route::get('login/web' , 'WebController@login')->name('login.web');

Route::post('teacher/register' , 'WebController@teacherRegister')->name('teacher.register');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard' , 'WebController@dashboard')->name('dashboard');

    // logout
    Route::get('logout' , 'WebController@logout')->name('logout');

    // Roles
    Route::resource('roles', 'RoleController');

    // Users
    Route::resource('users', 'UserController');

    // teachers
    Route::resource('teachers', 'TeacherController');

    // teachers_profile
    Route::resource('teachers_profile', 'TeacherProfileController');

    // students
    Route::resource('students', 'StudentController');

    // teacher_availablity
    Route::resource('teacher_availablity', 'TeacherAvailablityController');
    Route::get('get-price' , 'TeacherAvailablityController@getPrice')->name('get-price');

    // course
    Route::resource('course', 'CourseController');
    Route::get('class-schedule','CourseController@classSchedule')->name('class-schedule');
    Route::get('class-single','CourseController@classSingle')->name('class-single');
    Route::get('teacher-package/show/{id}','CourseController@teacherPackagesStore')->name('teacher-package.show');

    Route::get('user/profile',[ProfileController::class, 'editProfile'])->name('user-profile');
    Route::post('user/profile',[ProfileController::class, 'updateProfile'])->name('user-profile-update');
    Route::post('class-schedule',[CourseController::class, 'storeTeacherSelect'])->name('store-teacher-select');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('forget-password','forgetPassword')->name('forget-password');
});


Route::controller(StudentPackageController::class)
->prefix('studet-schedule')
->name('studet-package-')
->group(function(){
    Route::get('index','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{id}','edit')->name('edit');
    Route::post('update/{studentPackage}', 'update')->name('update');;
    Route::get('destroy/{student_package}','destroy')->name('destroy');
});

Route::get('teachers-student/{teacher}',[StudentController::class, 'studentTeacherSelecte'])->name('teachers.show');


// Student on Teacter Dashboard
Route::get('students', [TeacherController::class, 'all_students'])->name('students');
Route::get('student_details/{id}', [TeacherController::class, 'show_details'])->name('studentdetails');


// Teacher student review
Route::get('review/{id}', [TeacherStudentController::class, 'index'])->name('review');
Route::post('send_review/{id}', [TeacherStudentController::class, 'store'])->name('send.review');

Route::get('edit_review/{id}', [TeacherStudentController::class, 'edit'])->name('edit.review');
Route::post('update_review/{id}', [TeacherStudentController::class, 'update'])->name('update.review');


Route::get('all_reviews', [TeacherStudentController::class, 'show'])->name('all.reviews');


Route::get('delete_review/{id}', [TeacherStudentController::class, 'destroy'])->name('delete.review');




