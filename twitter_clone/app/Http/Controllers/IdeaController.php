<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'content' => 'required|string|max:250',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Idea::create($validatedData);
        return redirect()->to('/')->with(['success' => 'Idea created successfully']);
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {
        if ($idea->user->id !== Auth::user()->id) {
            abort(401);
        }

        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    public function update(Request $request, Idea $idea)
    {
        if ($idea->user->id !== Auth::user()->id) {
            abort(401);
        }
        $validatedData = $request->validate([
            'content' => 'required|max:250|string'
        ]);

        $result = $idea->update($validatedData);

        if ($result) {
            return redirect()->route("ideas.show", $idea->id)->with(['success' => 'Idea updated successfully']);
        }

        dd($idea);
    }

    public function destroy(Idea $idea)
    {
        if ($idea->user->id !== Auth::user()->id) {
            abort(401);
        }
        $idea->delete();
        return redirect()->to('/')->with(['success' => 'Idea deleted successfully']);
    }
}
