<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthController;

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
    return view('Admin.Auth.sign-in');
});
Route::post('sign-in',[AuthController::class,'signIn'])->name('signIn');
Route::get('sign-in-form',[AuthController::class,'show'])->name('signIn-form');
// Route::get('/sign-out',function(){

//     Auth::logout();
//     return redirect('/');
// })->name('signout');
Route::get('/sign-out', [AuthController::class, 'signOut'])->name('signout'); //This route is not working
// Company


Route::middleware(['customAuth'])->group(function(){
    // Company
    Route::resource('company',CompanyController::class);
    Route::get('company/ajax/get', [CompanyController::class, 'getCompanies'])->name('get.ajax.company');
    
    
    // Employee
    Route::resource('employee',EmployeeController::class);
    Route::get('employee/ajax/get', [EmployeeController::class, 'getEmployees'])->name('get.ajax.employee');
});


