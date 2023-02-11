<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\VisitorController;

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
    // return view('welcome');
    return view('auth.login');
});
Route::controller(CustomAuthController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('custom-login','Custom_Login')->name('login.custom');
    Route::get('registration','Register')->name('register');
    Route::post('custom-registration','Custom_Registration')->name('register.custom');
    Route::get('dashboard','Dashboard')->name('dashboard');
    Route::get('logout','Logout')->name('logout');
});

Route::controller(ProfileController::class)->group(function(){
    Route::get('profile','index')->name('profile');
    Route::post('profile/edit_profile_validation','Edit_Profile_Validation')->name('profile.edit_profile_validation');
}); 
Route::controller(SubUserController::class)->group(function(){
    Route::get('sub_user','index')->name('sub_user');
    Route::get('sub_user/fetchall','FetchAll')->name('sub_user.fetchall');
    Route::get('sub_user/addsubuser','AddSubUser')->name('sub_user.add');
    Route::post('sub_user/add_validation','AddValidation')->name('sub_user.add_validation');
    Route::get('sub_user/edit/{id}','SubUserEdit')->name('edit');
    Route::post('sub_user/edit_validation','Edit_SubUser_Validation')->name('sub_user.edit_validation');
    Route::get('sub_user/delete/{id}','DeleteSubUser')->name('delete');
}); 
Route::controller(DepartmentController::class)->group(function(){
    Route::get('department','index')->name('department');
    Route::get('department/fetchall','FetchAll')->name('department.fetchall');
    Route::get('department/add','AddDepartment')->name('department.add');
    Route::post('department/add_validation','AddValidation')->name('department.add_validation');
    Route::get('department/edit/{id}','DepartmentEdit')->name('edit');
    Route::post('department/edit_validation','Edit_Department_Validation')->name('department.department_validation');
    Route::get('department/delete/{id}','DeleteDepartment')->name('delete');
}); 

Route::controller(VisitorController::class)->group(function(){
    Route::get('visitor', 'index')->name('visitor');
    Route::get('visitor/fetchall',  'fetch_all')->name('visitor.fetchall');
});

Route::controller(Maincontroller::class)->group(function(){
    Route::get('main','index')->name('main');
    // Route::get('department/fetchall','FetchAll')->name('department.fetchall');
    // Route::get('department/add','AddDepartment')->name('department.add');
    // Route::post('department/add_validation','AddValidation')->name('department.add_validation');
    // Route::get('department/edit/{id}','DepartmentEdit')->name('edit');
    // Route::post('department/edit_validation','Edit_Department_Validation')->name('department.department_validation');
    // Route::get('department/delete/{id}','DeleteDepartment')->name('delete');
}); 