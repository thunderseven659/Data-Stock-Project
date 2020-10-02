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

//Route::get('/', 'Controller_login@show')->name('login');
//Route::post('/', 'Controller_login@login')->name('main');
Route::get('/', 'Controller_login@login')->name('login');
Route::get('/register','Controller_register@show')->name('register');
Route::post('/register', 'Controller_register@insert')->name('insertRegister');



