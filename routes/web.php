<?php

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
})->middleware('generalMiddleware');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('generalMiddleware');


/*Login Process*/
Route::POST("/login_process","loginController@index")->name("login_process");


/*Admin*/
Route::get("/admin/dashboard","adminController@dashboard")->name("/admin/dashboard");
Route::post("/admin/add_post","adminController@addPost");
Route::get("/admin/edit_post/{id}","adminController@editPost");
Route::post("/admin/update_post","adminController@updatePost");
Route::get("/admin/delete_post/{id}","adminController@deletePost");
Route::POST("/admin/delete_post_multiple","adminController@deletePost_2");

/*User*/
Route::get("/user/dashboard","userController@dashboard")->name("/user/dashboard");

/*logout Process*/
Route::get("/logout_process","logout@logout")->name("/logout_process");
