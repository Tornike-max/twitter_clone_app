<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function __invoke()
    {

        $user = Auth::user();
        $followingIds = $user->followings()->pluck('user_id');
        $followingIds[] = $user->id;


        $ideas = Idea::whereIn('user_id', $followingIds)->latest();

        $ideas->when(request()->has('query'), function ($query) {
            $query->search(request('query'));
        });

        $ideas = $ideas->orderBy('created_at', 'desc')->paginate(5);


        return view('dashboard', [
            'ideas' => $ideas,
        ]);
    }
}
