<?php

use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/form',[EmployeeController::class,'index'])->name('index');
Route::post('/form/store',[EmployeeController::class,'store'])->name('store');
Route::get('/form/edit/{id}',[EmployeeController::class,'edit'])->name('edit');
Route::get('/form/delete/{id}',[EmployeeController::class,'delete'])->name('delete');