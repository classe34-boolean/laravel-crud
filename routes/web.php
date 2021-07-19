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

// Route::get('/saluta/{nome}', function($nome) {
//     return "Ciao " . $nome;
// });

Route::get('/saluta/{nome}', 'HomeController@saluta');
Route::get('/quadrato/{numero}', 'HomeController@quadrato');

Route::get('/', 'HomeController@index')->name("home");
// Route::get('/url', 'NomeController@nomemetodo');
// Route::post('/url', 'NomeController@nomemetodo');
// Route::put('/url', 'NomeController@nomemetodo');
// Route::delete('/url', 'NomeController@nomemetodo');
// Route::get('/url', 'NomeController@nomemetodo');
// Route::get('/url', 'NomeController@nomemetodo');
// Route::get('/url', 'NomeController@nomemetodo');

Route::resource('beers', 'BeerController');
