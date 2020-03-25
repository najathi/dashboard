<?php

use Illuminate\Support\Facades\Route;
use App\Division;

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

Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/', 'HomeController@index')->name('home');

route::get('/profile', function () {
    return view('admin.profile.profile');
});

Route::group(['middleware' => 'admin'], function () {

    /* Should not contain last '/' slash because it will be caused 404 not found Error  */
    Route::resource('/admin/users', 'AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);
});

Route::get('/json/district/{id}/divisions', 'EmployeesController@divisions');

Route::resource('/forms/employee', 'EmployeesController');

Route::get('/forms/employee/{id}/id_card', 'EmployeesController@printPDFIdCard')->name('employee.id_card');
Route::get('/forms/employee/{id}/assign_cert','EmployeesController@printPDFAssCert')->name('employee.assign_cert');
Route::get('/forms/employee/{id}/visit_card','EmployeesController@printPDFVisitCard')->name('employee.visit_card');


