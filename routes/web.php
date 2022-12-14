<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseReviewController;
use App\Http\Controllers\CourseTagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', HomeController::class)
    ->name('home.index');

Route::resource('courses', CourseController::class);

Route::get('/courses/tag/{tag}', [CourseTagController::class, 'index'])->name('courses.tags.index');

Route::resource('courses.reviews', CourseReviewController::class)->only(['store', 'destroy']);

Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);

Auth::routes();
