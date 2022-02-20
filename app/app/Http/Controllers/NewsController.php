<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list() {

        $messages = auth()->user()
            ->follows
            ->map(function ($user) {
                return $user->messages;
            })
            ->flatten();

        return view('news.news', ['messages' => $messages]);
    }
}
