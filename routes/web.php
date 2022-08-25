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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('roles','RolesController')->middleware('auth');;
Route::get('/home', 'HomeController@index')->name('home');
Route::PATCH('/permissions/{permissions}','PermissionsController@update');
Route::resource('userinfo','UserInfoController')->middleware('auth');
Route::resource('faculty','FacultyController')->middleware('auth');
Route::get('/programme/create/{id}','ProgrammeController@create')->middleware('auth');
Route::resource('programme','ProgrammeController')->middleware('auth');
Route::resource('programmestructure','ProgrammeStructureController')->middleware('auth');
Route::get('delete/{id}', ['uses' => 'ProgrammeStructureController@delete', 'as' => 'delete-structure']);
Route::resource('campus','CampusController')->middleware('auth');


