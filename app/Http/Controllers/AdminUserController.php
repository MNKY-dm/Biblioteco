<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminUserController extends Controller
{
    public function edit(User $user)
    {
        Gate::authorize('access-admin-dashboard');

        $roles = Role::orderBy('role')->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        Gate::authorize('access-admin-dashboard');

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        Gate::authorize('access-admin-dashboard');

        if (auth()->id() === $user->id) {
            return redirect()
                ->route('admin.dashboard')
                ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function restore($id)
    {
        Gate::authorize('access-admin-dashboard');

        $user = User::withTrashed()->findOrFail($id);

        if ($user->trashed()) {
            $user->restore();
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Utilisateur restauré avec succès.');
    }
}
