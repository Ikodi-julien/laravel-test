<?php

namespace App\Http\Controllers;

use App\Mail\FollowerMail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class FollowController extends Controller
{
    public function setFollow() {
        $me = auth()->user();
        $userToFollow = User::where('email', request('email'))->firstOrFail();

        $me->follows()->attach($userToFollow);
        flash("Vous suivez maintenant {$userToFollow->email}")->success();

        Mail::to($userToFollow)->send(new FollowerMail($me));

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
