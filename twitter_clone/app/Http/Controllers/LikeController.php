<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Idea $idea)
    {
        $idea->likes()->attach(Auth::user()->id);
        return redirect()->route('dashboard')->with(['success' => 'User Successfully likes idea']);
    }

    public function unlike(Idea $idea)
    {
        $idea->likes()->detach(Auth::user()->id);
        return redirect()->route('dashboard')->with(['success' => 'User Successfully unlikes idea']);
    }
}
