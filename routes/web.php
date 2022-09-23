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

// Home
Route::get('/', function () {
    return view('home.home');
});

Route::get('/home', function () {
    return view('home.home');
});

//companies
Route::get('/companies', 'App\Http\Controllers\Companies\CompanyController@index')->name("companies.index");
Route::post('/companies/add', 'App\Http\Controllers\Companies\CompanyController@store')->name("companies.store");
Route::get('/companies/add', 'App\Http\Controllers\Companies\CompanyController@create')->name("companies.create");
Route::get('/companies/show/{id}', 'App\Http\Controllers\Companies\CompanyController@show')->name("companies.show");
Route::get('/companies/edit/{id}', 'App\Http\Controllers\Companies\CompanyController@edit')->name("companies.edit");
Route::patch('/companies/edit/{id}', 'App\Http\Controllers\Companies\CompanyController@update')->name("companies.update");
Route::delete('/companies/delete/{id}', 'App\Http\Controllers\Companies\CompanyController@destroy')->name("companies.destroy");

//employee
Route::get('/employees', 'App\Http\Controllers\Employees\EmployeeController@index')->name("employees.index");
Route::post('/employees/add', 'App\Http\Controllers\Employees\EmployeeController@store')->name("employees.store");
Route::get('/employees/add', 'App\Http\Controllers\Employees\EmployeeController@create')->name("employees.create");
Route::get('/employees/show/{id}', 'App\Http\Controllers\Employees\EmployeeController@show')->name("employees.show");
Route::get('/employees/edit/{id}', 'App\Http\Controllers\Employees\EmployeeController@edit')->name("employees.edit");
Route::patch('/employees/edit/{id}', 'App\Http\Controllers\Employees\EmployeeController@update')->name("employees.update");
Route::delete('/employees/delete/{id}', 'App\Http\Controllers\Employees\EmployeeController@destroy')->name("employees.destroy");

Auth::routes();