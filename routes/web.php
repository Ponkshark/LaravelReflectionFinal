<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeController;

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'RetrieveCompanies'])->name('companies');

Auth::routes();

Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'RetrieveEmployees'])->name('employees');



Route::prefix('employees')->group(function () {
    Route::get('insert', [EmployeesController::class, 'insertform']);
    Route::post('create', [EmployeesController::class, 'insert']);
    Route::post('/post', [EmployeesController::class, 'store']);
});
Route::prefix('companies')->group(function () {
    Route::get('insert', [CompaniesController::class, 'insertform']);
    Route::post('create', [CompaniesController::class, 'insert']);
});

Route::resource('employee', EmployeeController::class);
Route::resource('company', CompanyController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
