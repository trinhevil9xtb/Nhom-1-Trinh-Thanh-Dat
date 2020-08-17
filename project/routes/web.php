<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/dang-tin', 'Thread@create');
Route::resource('thread', 'ThreadController');

//Route::resource('thread', 'ThreadController');
/*
Route::group(['middleware' => ['auth', 'admin'], function() {

    Route::resource('index', 'Admin\AdminController');

}]);
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'account'], function () {
    //Route::resource('admin', 'Admin\AdminController');
		Route::get('/', 'AccountController@index');
		Route::get('/edit', 'AccountController@edit');
		Route::post('/update', 'AccountController@update');
});

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin'], function () {
    //Route::resource('admin', 'Admin\AdminController');
		Route::get('/', function(){
			return view('admin.dashboard');
		});
		Route::resource('dashboard', 'Admin\DashboardController');
		Route::resource('user', 'Admin\UserController');
		Route::resource('thread', 'Admin\ThreadController');
		Route::resource('approval', 'Admin\ApprovalController');
		/******************************************************/
		Route::resource('category', 'Admin\CategoryController');
		Route::resource('brand', 'Admin\BrandController');
		Route::resource('location', 'Admin\LocationController');
});

