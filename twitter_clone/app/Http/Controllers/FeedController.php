<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function __invoke()
    {
        $q = request('query');

        $user = Auth::user();
        $followingIds = $user->followings()->pluck('user_id');
        $followingIds[] = $user->id;


        $ideas = Idea::whereIn('user_id', $followingIds)->latest();

        if (isset($q)) {
            $val = request()->validate([
                'query' => 'required|min:2'
            ]);

            $ideas->where('content', 'like', '%' . $val['query'] . '%');
        } else {
            $ideas->orderBy('created_at', 'desc');
        };

        $ideas = $ideas->paginate(5);

        return view('dashboard', [
            'ideas' => $ideas
        ]);
    }
}
