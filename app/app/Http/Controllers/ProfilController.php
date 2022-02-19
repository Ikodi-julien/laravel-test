<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        if (auth()->check()) {
        // if (!auth()->guest()) {
            // return redirect('connexion')->withErrors([
            //     'email' => 'Vous devez être connecté pour voir cette page'
            // ]);
            return view('profil.mon-compte');
        }

        flash("Vous devez être connecté pour voir cette page.")->error();
        return redirect('/connexion');
    }

    public function logout() {
        if (auth()->check()) {
            auth()->logout();
            flash('Vous êtes déconnecté')->success();
            return redirect('/');
        }
        flash('Vous n\'êtes pas connecté');
        return redirect('/connexion');
    }
}
