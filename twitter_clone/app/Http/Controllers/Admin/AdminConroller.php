<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        if (!Auth::user()->is_admin) {
            abort(401);
        }

        if (!Gate::allows('is-admin')) {
            abort(401);
        }

        $users = User::query()->where('is_admin', '!=', 1)->orderby('created_at', 'desc')->paginate(10);


        return view('admin.dashboard', [
            'users' => $users
        ]);
    }


    //users
    public function showUser(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|min:2',
            'email' => 'nullable|email',
            'status' => 'nullable|string'
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.user.edit', $user->id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
