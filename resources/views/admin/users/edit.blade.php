@extends('template.template')
@section('title', 'Biblioteco - Modifier un utilisateur')

@section('content')
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="tm-text-primary">Modifier un utilisateur</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10 col-12">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="tm-bg-gray p-5">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-4">
                        <label for="surname">Nom</label>
                        <input type="text" name="surname" id="surname" class="form-control"
                               value="{{ old('surname', $user->surname) }}">
                        @error('surname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="name">Prénom</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $user->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                               value="{{ old('email', $user->email) }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="tel">Téléphone</label>
                        <input type="text" name="tel" id="tel" class="form-control"
                               value="{{ old('tel', $user->tel) }}">
                        @error('tel')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="id_role">Rôle</label>
                        <select name="id_role" id="id_role" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('id_role', $user->id_role) == $role->id ? 'selected' : '' }}>
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary">Enregistrer</button>


                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Retour</a>
                </form>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Supprimer l'utilisateur
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
