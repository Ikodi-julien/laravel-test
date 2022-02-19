<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

        $user = User::where('email', $email)->firstOrFail();
        // $messages = Message::where('user_id', $user->id)->orderByDesc('created_at')->get();
        // $messages = Message::where('user_id', $user->id)->latest()->get();
        // $messages = $user->messages;

        return view('user.messages', [
            'user' => $user,
        ]);
    }
}
