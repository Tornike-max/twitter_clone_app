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
}
