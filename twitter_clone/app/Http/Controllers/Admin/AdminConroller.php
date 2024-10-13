<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->status) {
            abort(401);
        }

        if (!Gate::allows('is-admin')) {
            abort(401);
        }

        $users = User::query()->where('status', '!=', 'superadmin')->orderby('created_at', 'desc')->paginate(10);
        $ideas = Idea::query()->with('user')->latest()->paginate(10);

        return view('admin.dashboard', [
            'users' => $users,
            'ideas' => $ideas
        ]);
    }


    //users
    public function showUser(User $user)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function editUser(User $user)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        $validatedData = $request->validate([
            'name' => 'nullable|string|min:2',
            'email' => 'nullable|email',
            'status' => 'nullable|string'
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.user.edit', $user->id)->with(['success' => 'User updated successfully']);
    }

    public function deleteUser(User $user)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        $user->delete();
        return redirect()->route('admin.dashboard')->with(['success' => 'User deleted successfully']);
    }


    //ideas
    public function ideasShow(Idea $idea)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        return view('admin.ideas.show', [
            'idea' => $idea
        ]);
    }

    public function editIdea(Idea $idea)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        return view('admin.ideas.edit', [
            'idea' => $idea
        ]);
    }

    public function updateIdea(Request $request, Idea $idea)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        $validatedData = $request->validate([
            'content' => 'required|string'
        ]);

        $idea->update($validatedData);
        return redirect()->route('admin.idea.edit', $idea->id)->with(['success' => 'Idea updated successfully']);
    }

    public function deleteIdea(Idea $idea)
    {
        if (!Gate::allows('is-admin')) {
            abort(401);
        }
        $idea->delete();
        return redirect()->route('admin.dashboard')->with(['success' => 'Idea deleted successfully']);
    }
}
