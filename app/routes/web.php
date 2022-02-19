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

Route::view('/', 'index');

Route::view('/posts', 'posts.index');

Route::get('/signin', 'SignInController@showForm');
Route::post('/signin', 'SignInController@checkForm');

Route::get('/users', 'UserController@list');

Route::get('/connexion', 'ConnexionController@showConnexionForm');
Route::post('/connexion', 'ConnexionController@checkConnexionForm');
Route::get('/logout', 'ProfilController@logout');

Route::get('/mon-compte', 'ProfilController@index');
