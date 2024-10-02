<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $q = request('query');

        $ideas = Idea::query()->with(['comments', 'user']);

        if (isset($q)) {
            $val = request()->validate([
                'query' => 'required|min:2'
            ]);

            $ideas->where('content', 'like', '%' . $val['query'] . '%');
        } else {
            $ideas->orderBy('created_at', 'desc');
        };

        $ideas = $ideas->paginate(5);


        return view('dashboard', [
            'ideas' => $ideas
        ]);
    }
}
