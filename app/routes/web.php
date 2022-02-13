<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/bjr/{name}', function () {
    // $name = $_GET['name'];
    $name = request('name');
    return view('bonjour', ['name' => $name]);
});

Route::get('/submit', function () {
    return view('auth.submit');
});

Route::post('/submit', function () {
    // $email = $_POST['email'];
    // $email = request('email');
    request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required']
    ]);
    $user = new User([
        'email' => request('email'),
        'password' => bcrypt(request('password'))
    ]);

    $user->save();

    return 'Formulaire reçu, l\'email : ' . request('email') . '<br> le mot de passe : ' . request('password');
});

Route::get('/users', function() {
    $users = User::all();
    return view('users', ['users' => $users]);
});
