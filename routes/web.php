<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MemberTypesController;
use App\Http\Controllers\Admin\ReminderController;
use App\Http\Controllers\Admin\PermissionController;

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

Route::get('/', function () {

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['register' => false]);


Route::prefix('dashboard')->middleware('auth:web')->group(function(){

    Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');
    Route::get('/profile', [ProfileController::class, 'index']);


    Route::resource('country', CountryController::class);
    Route::resource('color', ColorController::class);
    Route::resource('reminders', ReminderController::class);
    Route::resource('memberType', MemberTypesController::class);
    Route::resource('member', MemberController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('about', AboutController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('client', ClientController::class);
    Route::resource('profile', ProfileController::class);

});


/*
|-------------------------------------------------------------
|role&permission
|------------------------------------------------------------------
*/
Route::prefix('dashboard')->middleware(['auth:web'])->group(function () {

Route::resource('role', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('categories', CategoryController::class);
});

