<?php

use App\Models\Category;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use GuzzleHttp\Middleware;

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

Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');

Route::group(['prefix'=>'admin'],function ()
{
    Route::group(['prefix'=>'category'],function ()
    {
        Route::get('list','CategoryController@getDanhSach');

        Route::get('edit/{id}','CategoryController@getSua')->middleware('adminr');
        Route::post('edit/{id}','CategoryController@postSua')->middleware('adminr');

        Route::get('add','CategoryController@getThem')->middleware('adminr');
        Route::post('add','CategoryController@postThem')->middleware('adminr');
    });

    Route::group(['prefix'=>'item','middleware'=>'adminr'],function ()
    {
        Route::get('list','ItemController@getDanhSach');

        Route::get('edit/{id}','ItemController@getSua');
        Route::post('edit/{id}','ItemController@postSua');

        Route::get('add','ItemController@getThem');
        Route::post('add','ItemController@postThem');

        Route::post('search','ItemController@postSearch');

        Route::get('delete/{id}','ItemController@getXoa');
    });

    Route::group(['prefix'=>'user'],function ()
    {
        Route::get('list','UserController@getDanhSach');
        
        Route::get('edit/{id}','UserController@getSua');
        Route::post('edit/{id}','UserController@postSua');

        Route::get('add','UserController@getThem')->middleware('adminr');
        Route::post('add','UserController@postThem')->middleware('adminr');

        Route::post('search','UserController@postSearch')->middleware('adminr');
        Route::get('delete/{id}','UserController@getXoa');
    });
});