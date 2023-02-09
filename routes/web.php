<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'RetrieveCompanies'])->name('companies');

Auth::routes();

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'RetrieveEmployees'])->name('employees');

Route::prefix('employees')->group(function () {
    Route::get('insert', [EmployeeController::class, 'insertform']);
    Route::post('create', [EmployeeController::class, 'insert']);
    Route::post('/post', [EmployeeController::class, 'store']);
});
Route::prefix('companies')->group(function () {
    Route::get('insert', [CompanyController::class, 'insertform']);
    Route::post('create', [CompanyController::class, 'insert']);
});

Route::resource('employee', EmployeeController::class);
Route::resource('company', CompanyController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/employeessuccess', [App\Http\Controllers\EmployeesSuccessController::class, 'index'])->name('employeessuccess');

Auth::routes();

Route::get('/companiessuccess', [App\Http\Controllers\CompaniesSuccessController::class, 'index'])->name('companiessuccess');
