<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/get/regi_data/{id}', [HomeController::class, 'edit']);
Route::put('/update/regi_data/{id}', [HomeController::class, 'update']);
Route::get('/details/regi_info/{id}', [HomeController::class, 'details']);
Route::get('/delete/regi_info/{id}', [HomeController::class, 'delete']);
Route::get('/cv_view/{id}', [HomeController::class, 'view']);
Route::get('/cv_download/{file}', [HomeController::class, 'download']);



Route::get('/', [DashboardController::class, 'deshboard'])->name('deshboard');
Route::post('/get/district/list/ajax', [DashboardController::class, 'getDistrictListAjax']);
Route::post('/get/upazila/list/ajax', [DashboardController::class, 'getUpazilatListAjax']);
Route::post('/submit-form', [DashboardController::class, 'formSubmit']);



