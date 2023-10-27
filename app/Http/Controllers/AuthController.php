<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $isAuth = Auth::attempt($data, true);

        if (!$isAuth) throw ValidationException::withMessages(['email' => 'Authentication failed.']);

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function destroy() {}
}
