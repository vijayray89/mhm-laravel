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
    return view('login');
});

Route::get('/create', 'App\Http\Controllers\Users@create');
Route::post('/loginsubmit', 'App\Http\Controllers\Users@loginsubmit');
Route::post('/register', 'App\Http\Controllers\Registration@register');


Route::group(['middleware'=>['logData']],function () {
    //Route::post('/createsubmit', 'App\Http\Controllers\Users@createsubmit');
    Route::get('/dashboard', 'App\Http\Controllers\Users@dashboard');
    Route::get('/list', 'App\Http\Controllers\Users@list');
    Route::get('/logout', 'App\Http\Controllers\Users@logout');
    Route::delete('/delete', 'App\Http\Controllers\Registration@delete');
    Route::put('/update/{id}', 'App\Http\Controllers\Registration@update');
    Route::get('/doctor','App\Http\Controllers\Doctors_controller@doctorList');
    
});