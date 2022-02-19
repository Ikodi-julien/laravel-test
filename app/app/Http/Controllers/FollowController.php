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
    public function deleteFollow() {
        $me = auth()->user();
        $userToDeleteFollow = User::where('email', request('email'))->firstOrFail();

        $me->follows()->detach($userToDeleteFollow);
        flash("Vous ne suivez plus {$userToDeleteFollow->email}")->success();

        return back();
    }
}
