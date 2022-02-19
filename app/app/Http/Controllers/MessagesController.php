<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function checkMessage() {
        // Vérifier que la personne est connectée
        if (auth()->check()) {
            request()->validate([
                'message' => ['required'],
            ]);

            // Création d'un message en base de données
            $message = new Message([
                'user_id' => auth()->id(),
                'content' => request('message')
            ]);
            $message->save();

            // Redirect
            flash('Votre message a bien été publié.')->success();
            return back();
        }

        flash('Vous devez être connecté pour voir cette page')->error();
        return redirect('/connexion');
    }
}
