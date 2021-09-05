<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get("dashboard",function(){
    return view("admin.dashboard");
});


/**
 * Change user password
 */
Route::get("change-password","App\Http\Controllers\Auth\ChangePasswordController@index") -> name("password.change");
Route::post("change-password","App\Http\Controllers\Auth\ChangePasswordController@changePass") -> name("change.user.pass");

/**
 * user profle
 */
Route::get("user-profile","App\Http\Controllers\Auth\userProfileController@index") -> name("user.profile");
Route::post("user-profile-update","App\Http\Controllers\Auth\userProfileController@userProfileUpdate") -> name("user.profile.update");

/**
 * user crud
 */
Route::resource("user","App\Http\Controllers\userController");

/**
 * Role crud
 */
Route::resource("role","App\Http\Controllers\RoleController");

/**
 * Tags routes
 */
Route::resource("tag","App\Http\Controllers\TagController");
Route::get("tag-status/{id}","App\Http\Controllers\TagController@tagStatus") -> name("tag.status");

/**
 * Category routes
 */
Route::resource("category","App\Http\Controllers\CategoryController");
Route::get("category-status/{id}","App\Http\Controllers\CategoryController@catStatus") -> name("cat.status");

/**
 * Post routes
 */
Route::resource("post","App\Http\Controllers\PostController");
Route::get("post-status/{id}","App\Http\Controllers\PostController@postStatus") -> name("post.status");