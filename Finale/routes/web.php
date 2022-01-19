<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;


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

Auth::routes();

//Admin Routes
    Route::prefix(prefix:'admin')->middleware('auth', 'auth.isAmdin')->name(value:'admin.')->group (function () {
        Route::resource(name:'/users', controller: UserController::class);

    });

    Route::get('customURL','YourController@defaultmethod')->name('admin.users.index');

    



