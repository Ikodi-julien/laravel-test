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

        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($result) {
            return redirect('/mon-compte');
        }

        return back()->withInput()->withErrors(['email' => 'Identifiants incorrects']);
    }
}
