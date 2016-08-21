<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $users= \App\User::all();
    return view('welcome')->withUsers($users);
});

Route::get('/aaa', function () {
    $users= \App\User::paginate(9);
    return  $users ;
});