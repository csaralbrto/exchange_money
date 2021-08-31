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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/profile', function () {
    return view('profile');
});

/* Routes from Users */
Route::post('userSave', 'UserController@store')->name('userSave');
Route::middleware('auth')->get('showUserData', 'UserController@show')->name('showUserData');
Route::middleware('auth')->put('editUserData', 'UserController@update')->name('editUserData');
/* End Routes from Users */

/* Routes from Accounts */
Route::post('accountSave', 'AccountsController@store')->name('accountSave');
Route::middleware('auth')->get('allAccountsUsers', 'AccountsController@show')->name('allAccountsUsers');
Route::middleware('auth')->get('getAccount', 'AccountsController@findAccount')->name('getAccount');
/* End Routes from Accounts */
