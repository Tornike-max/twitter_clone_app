<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{

    public function lang(string $language)
    {
        app()->setLocale($language);
        session()->put('locale', $language);

        return redirect()->route('dashboard');
    }
}
