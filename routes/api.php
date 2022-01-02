<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ColorControler;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CountryControler;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\CategoryControler;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ReminderController;
use App\Http\Controllers\Api\MemberTypeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\ProfileSettingController;

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


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('countries',[CountryControler::class, 'index']);
    Route::get('countries/show/{id}',[CountryControler::class, 'show']);
    Route::get('colors',[ColorControler::class, 'index']);
    Route::get('colors/show/{id}',[ColorControler::class, 'show']);
    Route::get('categories',[CategoryControler::class, 'index']);
    Route::get('categories/show/{id}',[CategoryControler::class, 'show']);

    Route::get('profile-setting',[ProfileSettingController::class, 'getProfile']);
    Route::post('profile-setting/update',[ProfileSettingController::class, 'updateProfile']);

    Route::get('member-types',[MemberTypeController::class, 'index']);

    Route::get('members',[MemberController::class, 'index']);
    Route::post('members/store',[MemberController::class, 'store']);


    Route::post('logout',[LoginController::class, 'logout']);
    //reminders
    Route::apiResource('reminders', ReminderController::class);
    Route::delete('reminders/{reminder}/{date}', [ReminderController::class, 'endReminder']);
    Route::delete('reminder/{reminder}/{date}', [ReminderController::class, 'deleteSecificDate']);
    Route::get('my-reminders/{date?}', [ReminderController::class, 'myReminders']);
    Route::post('mark-as-done/{reminder}/{date}', [ReminderController::class, 'markAsDone']);
     //notifications
     Route::get('notifications', [NotificationController::class, 'index']);
     Route::patch('notifications', [NotificationController::class, 'markAllAsRead']);

});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login',[LoginController::class, 'login'])->middleware();

Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('passwords.sent');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('passwords.reset');
