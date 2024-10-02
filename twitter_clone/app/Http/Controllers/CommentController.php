<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea)
    {
        $validatedComment = $request->validate([
            'content' => 'string|min:1'
        ]);

        $validatedComment['user_id'] = Auth::user()->id;
        $validatedComment['idea_id'] = $idea->id;

        Comment::create($validatedComment);

        return redirect()->route('dashboard')->with(['message' => 'Comment Added successfully']);
    }
}
