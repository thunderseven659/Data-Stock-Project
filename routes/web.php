<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller_login;
use Illuminate\Auth\Events\Login;
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





Route::group(['middleware' => 'loginlogout'], function () {
    Route::post('/','Controller_insert@add')->name('insertBarang');
    Route::get('/logout','Controller_main@logout')->name('Logout');
    Route::get('/','Controller_insert@show')->name('insertData');
    Route::get('/updateDelete','Controller_updateDelete@show')->name('updateDelete');
     Route::get('/read','Controller_read@show')->name('read');
    Route::get('/verification','Controller_verification@show')->name('verification');
    Route::post('/read','Controller_read@insertTransaction')->name('InsertTransaction');


});
Route::group(['middleware' => 'logoutlogin'], function () {
    Route::post('/login', 'Controller_login@login')->name('main');
    Route::get('/login', 'Controller_login@show')->name('login');
    Route::get('/register','Controller_register@show')->name('register');
    Route::post('/register', 'Controller_register@insert')->name('insertRegister');
    Route::get('/welcome','Controller_welcome@show')->name('welcome');
});
