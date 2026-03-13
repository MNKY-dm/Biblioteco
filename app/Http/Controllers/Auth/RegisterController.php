<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show() {
        return view('auth.register');
    }

    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'surname' => 'required|string|max:255',
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => Role::where('role', 'CLIENT')->first()->id,
            'tel' => $request->tel,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
