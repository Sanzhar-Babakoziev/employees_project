<?php

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
//     return view('employees');
// });

Route::get('/', 'HomeController@employees')->name('employees');

Route::get('/employees', 'HomeController@employees')->name('employees');

Route::get('analysis', 'HomeController@analysis')->name('analysis');

Route::get('/employees/sort/{dept_name}', 'HomeController@sort');

Route::get('/employees/search/{search}' , 'HomeController@search');


Route::get('/departments' , 'HomeController@getDepartment');


Route::get('/maxSal', 'HomeController@maxSal');

Route::get('/getHigh', 'HomeController@getHigh');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
