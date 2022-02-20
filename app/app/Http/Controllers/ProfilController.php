<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        return view('profil.mon-compte');
    }

    public function logout() {
        auth()->logout();
        flash('Vous êtes déconnecté')->success();
        return redirect('/');
    }

    public function checkNewPassword() {

        request()->validate([
            'password' => ['required', 'confirmed', 'min: 8'],
            'password_confirmation' => ['required'],
        ]);

        // Modifier l'utilisateur,
        $user = auth()->user();
        $user->password = bcrypt(request('password'));
        $user->save();

        // ou
        auth()->user()->update([
            'password' => bcrypt(request('password'))
        ]);

        flash('Votre mot de passe a été mis à jour')->success();
        return redirect('/mon-compte');
    }

    public function setAvatar() {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        $path = request('avatar')->store('avatars');

        return  $path;
    }
}
