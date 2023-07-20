<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'deshboard'])->name('deshboard');

Route::post('/get/district/list/ajax', [HomeController::class, 'getDistrictListAjax']);
Route::post('/get/upazila/list/ajax', [HomeController::class, 'getUpazilatListAjax']);
Route::post('/get/exam_name/list/ajax', [HomeController::class, 'getExamNameListAjax']);
Route::post('/submit-form', [HomeController::class, 'formSubmit']);
// Route::post('/registration/post', [HomeController::class, 'studentRegistration']);



