<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;
use User\Profile;

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
    return view('index');
});

//User related pages
Route::prefix(prefix:'user')->middleware(['auth',  'verified'])->name(value:'user.')->group (function () {
    Route::get('profile', Profile::class);
});


Auth::routes();

//Admin Routes
    Route::prefix(prefix:'admin')->middleware(['auth', 'auth.isAmdin', 'verified'])->name(value:'admin.')->group (function () {
        Route::resource(name:'/users', controller: UserController::class);

    });

    Route::get('customURL','YourController@defaultmethod')->name('admin.users.index');
    Route::get('/home', 'HomeController@index')->middleware(['web','auth']);
    Route::get('/admin-panel', 'AdminController@index')->middleware(['web','auth']);
    
    Route::get('/users', 'UsersController@index')->middleware(['web','auth']);
    Route::get('/users/create', 'UsersController@create')->middleware(['web','auth']);
    Route::post('/users/store', 'UsersController@store')->middleware(['web','auth']);
    Route::get('/users/edit/{id}', 'UsersController@edit')->middleware(['web','auth']);
    Route::get('/users/{id}', 'UsersController@show')->middleware(['web','auth']);
    Route::put('/users/{id}', 'UsersController@update')->middleware(['web','auth']);
    Route::delete('/users/{id}', 'UsersController@destroy')->middleware(['web','auth']);
    
    Route::get('/roles', 'RolesController@index')->middleware(['web','auth']);
    Route::get('/roles/{id}', 'RolesController@show')->middleware(['web','auth']);
    
    Route::get('/profile', 'ProfileController@show')->middleware(['web','auth']);
    Route::get('/profile/edit', 'ProfileController@edit')->middleware(['web','auth']);
    Route::put('/profile', 'ProfileController@update')->middleware(['web','auth']);

    Route::get('/Users', 'UserController@index');

    



