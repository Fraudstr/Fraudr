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

// This facade is to add type hinting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);

Route::group(['prefix' => 'jobs', 'as' => 'job.'], function() {
    Route::get('/',        ['uses' => 'JobController@list',         'as' => 'list']);
    Route::get('/show/{job}',   ['uses' => 'JobController@show',         'as' => 'show']);
    Route::get('/show/{job}/submit',   ['uses' => 'JobController@submit',         'as' => 'show']);
    Route::get('/create',  ['uses' => 'JobController@showCreateForm', 'as' => 'create']);
    Route::post('/create', ['uses' => 'JobController@create', 'as' => 'create']);
});