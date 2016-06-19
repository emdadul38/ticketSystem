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
    return view('welcome');
});
Route:: get('/Home', function(){
	return View::make('pages.home');
});

Route:: get('/about', function(){
	return View::make('pages.about');
});

Route:: get('/contact', function(){
	return View::make('pages.contact');
});


Route::get('/tickets', 'TicketsController@index');
Route::get('/create', 'TicketsController@create');
Route::post('/store', 'TicketsController@store');
Route::get('/tickets/{slug?}','TicketsController@show');
Route::get('/tickets/{slug?}/edit', 'TicketsController@edit');
Route::post('/tickets/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}', 'TicketsController@destroy');

Route::post('/comment','CommentsController@newComment');