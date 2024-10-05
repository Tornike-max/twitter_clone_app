<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->with(['ideas', 'comments', 'likes', 'followers'])->where('id', '=', $id)->first();
        $ideasCount = $user->ideas()->count();
        $commentsCount = $user->comments()->count();
        $ideas = $user->ideas()->paginate(2);
        $followersCount = $user->followers->count();


        return view('profile.index', [
            'editing' => false,
            'ideas' => $ideas,
            'user' => $user,
            'followersCount' => $followersCount,
            'commentsCount' => $commentsCount,
            'ideasCount' => $ideasCount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->with('ideas')->where('id', '=', $id)->first();
        $ideasCount = $user->ideas()->count();
        $commentsCount = Comment::query()->where('user_id', '=', $user->id)->count();
        $followersCount = $user->followers->count();

        return view('profile.index', [
            'editing' => true,
            'user' => $user,
            'commentsCount' => $commentsCount,
            'followersCount' => $followersCount,
            'ideasCount' => $ideasCount
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'bio' => 'nullable',
            'image' => 'image'
        ]);

        $user = User::query()->find($id);

        if ($request->has('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('profile', 'public');
            $validatedData['image'] = $imagePath;
        }


        $result = $user->update($validatedData);

        if ($result) {
            return redirect()->route('user.show', $user->id)->with(['success' => 'User Updated Successflly']);
        } else {
            return redirect()->route('user.edit', $user->id)->with(['error' => 'Something went wrong']);
        }
    }

    public function profile()
    {
        return $this->show(Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
