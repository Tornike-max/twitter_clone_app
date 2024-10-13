<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store(StoreIdeaRequest $request)
    {
        if (request()->user()->isnot(Auth::user())) {
            abort(401);
        }

        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::user()->id;

        Idea::create($validatedData);
        return redirect()->to('/')->with(['success' => 'Idea created successfully']);
    }

    public function show(Idea $idea)
    {
        if (!Gate::allows('idea.action', $idea)) {
            abort(401);
        }

        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {

        if (!Gate::allows('is-author', $idea)) {
            abort(401);
        }

        if (!Gate::allows('idea.action', $idea)) {
            abort(401);
        }


        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {

        if (!Gate::allows('idea.action', $idea)) {
            abort(401);
        }


        if (!Gate::allows('is-author', $idea)) {
            abort(401);
        }

        $validatedData = $request->validated();

        $result = $idea->update($validatedData);

        if ($result) {
            return redirect()->route("ideas.show", $idea->id)->with(['success' => 'Idea updated successfully']);
        }
    }

    public function destroy(Idea $idea)
    {

        if (!Gate::allows('idea.action', $idea)) {
            abort(401);
        }

        if (!Gate::allows('is-author', $idea)) {
            abort(401);
        }
        $idea->delete();
        return redirect()->to('/')->with(['success' => 'Idea deleted successfully']);
    }
}
