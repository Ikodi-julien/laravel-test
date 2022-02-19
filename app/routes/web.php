<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\User;
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

Route::get('/', 'UserController@list');

Route::get('/signin', 'SignInController@showForm');
Route::post('/signin', 'SignInController@checkForm');
Route::get('/connexion', 'ConnexionController@showConnexionForm');
Route::post('/connexion', 'ConnexionController@checkConnexionForm');
Route::get('/logout', 'ProfilController@logout');
Route::get('/mon-compte', 'ProfilController@index');
Route::post('/modification-mot-de-passe', 'ProfilController@checkNewPassword');

Route::post('/messages', 'MessagesController@checkMessage');

Route::get('/{email}', 'UserController@showMessages');
