<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller
{
    public function setFollow() {
        $me = auth()->user();
        $userToFollow = User::where('email', request('email'))->firstOrFail();

        $me->follows()->attach($userToFollow);
        flash("Vous suivez maintenant {$userToFollow->email}")->success();

        return back();
    }
}
