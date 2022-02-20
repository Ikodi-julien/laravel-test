<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list() {

        // $messages = auth()->user()
        //     ->follows
        //     ->map(function ($user) {
        //         return $user->messages;
        //     })
        //     ->flatten()
        //     ->sortByDesc(function ($message) {
        //         return $message->created_at;
        //     });

        $messages = auth()->user()
        ->follows
        ->load('messages') // Permet de grouper les messages des différents user en une requête
        ->flatMap->messages
        ->sortByDesc->created_at;

        return view('news.news', ['messages' => $messages]);
    }
}
