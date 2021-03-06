<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function checkMessage() {
        request()->validate([
            'message' => ['required'],
        ]);

        // Création d'un message en base de données
        // $message = new Message([
        //     'user_id' => auth()->id(),
        //     'content' => request('message')
        // ]);
        // $message->save();

        auth()->user()->messages()->create([
            'content' => request('message')
        ]);

        // Redirect
        flash('Votre message a bien été publié.')->success();
        return back();
    }
}
