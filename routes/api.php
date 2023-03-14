<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ZoomController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\Course_discountController;
use App\Http\Controllers\API\TeacherController;
use App\Http\Controllers\API\Teacher_NotificationController;
use App\Http\Controllers\API\StudentWalletController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::post('register', 'register');
    Route::get('student-get/{id}' , 'studentProfile');
    Route::post('login', 'login');
    Route::post('email_verified','email_verified');
    Route::post('changePassword','changePassword');
    Route::post('user_update','user_update');
    Route::post('child_student','studentChild');
    Route::post('resend_otp','resendOtp');
    Route::get('email_verified','email_verified');
    Route::get('reset_otp','resetOpt');
    Route::post('forget-password','forgetPassword');
    Route::get('student-package','getStudentPackages');

});

Route::controller(ReviewController::class)->group(function(){
    Route::get('studentreview','index');
    Route::get('studentreview/{id}','studentReview');
    Route::post('studentreview','store');
    Route::post('teacher_review','teacherReview');
    Route::get('teacher_review/{id}','teacherReviewGet');
    // Route::get('teachers','allTeachers');

});

Route::controller(ZoomController::class)->group(function(){
    Route::post('craete_zoom','create');
    Route::post('teacherzom_links','index');
    Route::post('zoom_link','zoom_link');
    Route::post('update_zoom','update');
    Route::post('deletezoom','destroy');
});

Route::controller(AttendanceController::class)->group(function(){
    Route::get('student_attendace/{id}','index');
    Route::post('student_attendace','create');
});

Route::controller(PaymentController::class)->group(function(){
    Route::post('payment_detail','paymentDetail');
    Route::get('payment_detail/{id}','paymentSummary');
});

Route::controller(Course_discountController::class)->group(function(){
    Route::post('course_discount','discountGenerate');
    Route::post('course_discount/{id}','usedDiscount');
});

Route::controller(TeacherController::class)->group(function(){
    Route::get('teacher_follower/{id}','getFollowerCount');
    Route::get('teacherslist' , 'teachersList');
    Route::get('teacherdetail/{id}' , 'teacherDetail');
    Route::get('teacher_like/{id}','getLikeCount');
});


Route::controller(Teacher_NotificationController::class)->group(function(){
    Route::post('favourite-teacher' , 'favouriteTeacher');
    Route::post('teacher-follower' , 'teacherFollower');
});

Route::controller(StudentWalletController::class)->group(function(){
    Route::post('student_wallet/store' , 'store');
    Route::get('student_wallet/{id}' , 'index');
});
