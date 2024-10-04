<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        $follower = Auth::user();

        $follower->followings()->attach($user);
        return redirect()->route('user.show', $user->id)->with(['success' => 'User Followed Successfully']);
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();

        $follower->followings()->detach($user);
        return redirect()->route('user.show', $user->id)->with(['success' => 'User Followed Successfully']);
    }
}
