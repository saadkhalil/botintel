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

Route::get('/', ['uses' => 'Frontend\HomeController@index']);
Route::get('/signup', ['uses' => 'Frontend\SignupController@index']);
Route::get('/verification/{slug}', ['uses' => 'Auth\RegisterController@verification']);
Route::post('/forgotpasswordsubmit', ['uses' => 'Auth\ForgotPasswordController@forgotsubmit']);
Route::get('/changepassword/{slug}', ['uses' => 'Auth\ForgotPasswordController@changepassword']);
Route::post('/passwordsubmit/', ['uses' => 'Auth\ForgotPasswordController@passwordsubmit']);
Route::get('/profile', ['uses' => 'Frontend\ProfileController@index']);
Route::post('/profile/getProfile', ['uses' => 'Frontend\ProfileController@getprofile']);
Route::post('/profile/delProfile', ['uses' => 'Frontend\ProfileController@delprofile']);
Route::post('/profile/insertProfile', ['uses' => 'Frontend\ProfileController@insertprofile']);
Route::post('/profile/submit', ['uses' => 'Frontend\ProfileController@submit']);
Route::get('/settings', ['uses' => 'Frontend\SettingsController@index']);
Route::post('/settingssubmit', ['uses' => 'Frontend\SettingsController@update']);
Route::post('/settings/upgrade', ['uses' => 'Frontend\SettingsController@upgradeplan']);
Route::post('/settings/cancel', ['uses' => 'Frontend\SettingsController@cancelplan']);
Route::post('/changepasswordsubmit', ['uses' => 'Frontend\SettingsController@changepassword']);
Route::get('/release', ['uses' => 'Frontend\ReleaseController@index']);
Route::get('/releases/checkRelease', ['uses' => 'Frontend\ReleaseController@checkrelease']);
Route::get('/tasks', ['uses' => 'Frontend\TasksController@index']);
Route::post('/tasks/getData', ['uses' => 'Frontend\TasksController@getdata']);
Route::post('/tasks/cookie', ['uses' => 'Frontend\TasksController@Cookie']);
Route::get('/tasks/getcookiedata', ['uses' => 'Frontend\TasksController@getCookiedata']);
Route::post('/tasks/submit', ['uses' => 'Frontend\TasksController@submit']);
Route::post('/tasks/newTask', ['uses' => 'Frontend\TasksController@newTask']);
Route::post('/tasks/upTask', ['uses' => 'Frontend\TasksController@upTask']);
Route::post('/tasks/delTask', ['uses' => 'Frontend\TasksController@delTask']);
Route::get('/tasks/deletealltasks', ['uses' => 'Frontend\TasksController@deletealltasks']);
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('register/store', 'Auth\RegisterController@store');
Route::post('register/update', 'Auth\RegisterController@updatestripe');
Auth::routes();
Route::get('get_us_products', ['uses' => 'AdminReleasesController@GetUSProducts']);
Route::get('get_eu_products', ['uses' => 'AdminReleasesController@GetEUProducts']);
Route::get('generateexcel/{slug}', ['uses' => 'AdminTasksController@generateExcel']);
Route::post('admin/tasks/exporttasks', ['uses' => 'AdminTasksController@exporttasks']);
Route::get('/{slug}', ['uses' => 'Frontend\PagesController@index']);
Route::get('admin/successorders/import-data', ['uses' => 'AdminSuccessfulOrdersController@ImportExcel']);
Route::post('admin/successorders/submitimport', ['uses' => 'AdminSuccessfulOrdersController@SubmitImport']);

Route::get('/home', 'HomeController@index')->name('home');
