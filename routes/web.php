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
//user interface routes

Route::get('/', 'FrontendController@index');
Route::post('/search_items', 'FrontendController@search');
Route::get('/search-result/{name}', 'FrontendController@search');
Route::get('/channels/{name}/{id}', 'FrontendController@show');
Route::get('/watch/{name}/{id}', 'FrontendController@watch');
Route::get('/premium', 'FrontendController@premium');
Route::get('/subscribe/{name}', 'FrontendController@subscribe')->middleware('auth');
Route::post('/subscribe', 'FrontendController@payment')->middleware('auth');


//Admin Routes

Auth::routes();

Route::middleware(['auth','CheckAdmin'])->group(function () {
  
  Route::get('admin', 'Admin\AdminController@index');
  Route::resource('admin/roles', 'Admin\RolesController');
  Route::resource('admin/permissions', 'Admin\PermissionsController');
  Route::resource('admin/users', 'Admin\UsersController');
  Route::resource('admin/pages', 'Admin\PagesController');
  Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
      'index', 'show', 'destroy'
  ]);
  Route::resource('admin/settings', 'Admin\SettingsController');
  Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
  Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

  Route::resource('category', 'CategoryController');
  Route::resource('category', 'CategoryController');
  Route::resource('subcategory', 'SubcategoryController');
  Route::resource('videos', 'VideoController');  
  
    });

Route::get('/home', 'HomeController@index')->name('home');
