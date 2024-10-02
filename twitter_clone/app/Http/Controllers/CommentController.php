<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea)
    {
        $validatedComment = $request->validate([
            'content' => 'string|min:1'
        ]);

        $validatedComment['idea_id'] = $idea->id;

        Comment::insert($validatedComment);

        return redirect()->route('dashboard')->with(['message' => 'Comment Added successfully']);
    }
}
