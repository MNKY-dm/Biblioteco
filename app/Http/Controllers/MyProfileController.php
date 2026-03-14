<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MyProfileController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('my-profile', ['user' => $user]);
    }

    public function store(Request $request) : RedirectResponse {
        $user = Auth::user();

        $request->validate([
            'surname' => 'sometimes|nullable|string|max:255',
            'name' => 'sometimes|nullable|string',
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user->update(array_filter([
            'surname' => $request->surname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
        ]));

        return redirect()->route('my-profile');
    }
}
