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

Route::group([
    'middleware' => 'App\Http\Middleware\Auth'
], function() {
    Route::get('/logout', 'ProfilController@logout');
    Route::get('/mon-compte', 'ProfilController@index');
    Route::post('/modification-mot-de-passe', 'ProfilController@checkNewPassword');
    Route::post('/modification-avatar', 'ProfilController@setAvatar');
    Route::post('/messages', 'MessagesController@checkMessage');
    Route::post('/{email}/follow', 'FollowController@setFollow');
    Route::delete('/{email}/follow', 'FollowController@deleteFollow');
    Route::get('/news', 'NewsController@list');
});

Route::get('/{email}', 'UserController@showMessages');
