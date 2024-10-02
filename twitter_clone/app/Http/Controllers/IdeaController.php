<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:250',
        ]);

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
        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    public function update(Request $request, Idea $idea)
    {
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
        $idea->delete();
        return redirect()->to('/')->with(['success' => 'Idea deleted successfully']);
    }
}
