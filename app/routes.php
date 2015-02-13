<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'loggedin'), function (){
    Route::controller('login', 'LoginController');
    Route::controller('pendaftaran', 'RegisterController');
});
Route::get('logout', 'LoginController@logout');

Route::group(array('before' => 'login'), function (){
    Route::get('/', 'HomeController@dashboard');
    Route::resource('wawancara', 'WawancaraController', array('only' => array('store', 'show', 'update')));
    Route::resource('adjudikator', 'AdjudikatorCoontroller', array('only' => array('store', 'show', 'update')));
});
