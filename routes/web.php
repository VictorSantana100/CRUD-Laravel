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
    return view('index');
});

Route::group(['namespace' => 'App\Http\Controllers'], function(){

    Route::get('/list-users','UserListController@get_userList')->name('list.users');
    Route::get('/insert-user','UserController@get_insert_user')->name('insert.user');
    Route::get('/update-user','UserController@get_update_user')->name('update.user.get');
    Route::get('/load-user/{user_id}','UserController@get_load_user')->name('get.user');
    
    Route::post('/insert-user','UserController@set_insert_user');
    Route::delete('/delete-user/{user_id}','UserController@set_drop_user')->name('user.destroy');
    Route::put('/update-user/{user_id}','UserController@set_update_user')->name('update.user');
});

