<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with(['success' => 'Account created successfully']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function session(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = Auth::attempt($validatedData);
        $request->session()->regenerate();

        if ($user) {
            return redirect()->route('dashboard')->with(['success' => 'User logged in successfully']);
        } else {
            throw ValidationException::withMessages(['error' => 'Invalid cradentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('auth.login')->with(['success' => 'User logged out successfully']);
    }
}
