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

Route::get('/',          'LyricsController@search');
Route::get('song/{id}',  'LyricsController@song');


Route::get('/', function () {
    return view('search');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('artists', 'ArtistController');
Route::resource('songs',   'SongController');
