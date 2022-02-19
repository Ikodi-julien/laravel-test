<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function showMessages() {
        $email = request('email');

        // TODO get user and set view
        $user = User::where('email', $email)->first();

        return view('user.messages', ['user' => $user]);
    }
}
