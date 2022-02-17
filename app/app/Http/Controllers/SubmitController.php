<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function checkForm()
    {
        // $email = $_POST['email'];
        // $email = request('email');
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ], [
            'password.min' => 'Pour des raisons de sécurité, le mot de passe doit faire au moins :min caractères'
        ]);
        $user = new \App\User([
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $user->save();

        return 'Formulaire reçu, l\'email : ' . request('email') . '<br> le mot de passe : ' . request('password');
    }

    public function showForm() {
        return view('auth.submit');
    }
}
