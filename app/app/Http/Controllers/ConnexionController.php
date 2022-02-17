<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function showConnexionForm()
    {
        return view('auth.connexion');
    }

    public function checkConnexionForm()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ('required')
        ]);

        // TODO verif email et password ok
        auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);


        return 'Traitement formulaire connexion';
    }
}
