@extends('template.template')

@section('title', "Biblioteco - Mon profil")

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset("css/templatemo/img/hero.jpg") }}">        </div>
    <div class="tm-login-wrapper">
        <div class="tm-login-card">

            <div class="tm-login-header">
                <span class="tm-login-logo-text">Mon profil</span>
            </div>

            <h2 class="tm-login-title">{{ $user->surname . " " . $user->name }}</h2>

            <form method="POST" action="{{ route('update-profile') }}" class="tm-login-form">
                @csrf

                <div class="tm-login-field">
                    <label for="surname" class="tm-login-label">Prénom</label>
                    <input
                        name="surname"
                        id="surname"
                        type="text"
                        class="form-control tm-login-input"
                        value="{{ $user->surname }}"
                    />
                </div>
                @error('surname')
                <span class="tm-login-error-msg">{{ $message }}</span>
                @enderror

                <div class="tm-login-field">
                    <label for="name" class="tm-login-label">Nom</label>
                    <input
                        name="name"
                        id="name"
                        type="text"
                        class="form-control tm-login-input"
                        value="{{ $user->name }}"
                    />
                </div>
                @error('name')
                <span class="tm-login-error-msg">{{ $message }}</span>
                @enderror

                <div class="tm-login-field">
                    <label for="email" class="tm-login-label">Adresse e-mail</label>
                    <input
                        name="email"
                        id="email"
                        type="email"
                        class="form-control tm-login-input @error('email') tm-input-error @enderror"
                        value="{{ $user->email }}"
                        autocomplete="email"
                    />
                </div>
                @error('email')
                <span class="tm-login-error-msg">L'adresse mail est invalide</span>
                @enderror

                <div class="tm-login-field">
                    <label for="tel" class="tm-login-label">Numéro de téléphone</label>
                    <input
                        name="tel"
                        id="tel"
                        type="tel"
                        class="form-control tm-login-input @error('tel') tm-input-error @enderror"
                        @if($user->tel) value=" {{ $user->tel }}" @else placeholder="01 00 00 00 00" @endif"
                        autocomplete="tel"
                    />
                </div>
                @error('tel')
                <span class="tm-login-error-msg">L'adresse mail est invalide</span>
                @enderror

                <button type="button" class="tm-chg-psw-btn" id="btnChangePassWord">Modifier mon mot de passe</button>

                <div class="mb-7" id="chg-pswd-fields" hidden>
                    <div class="tm-login-field">
                        <label for="password" class="tm-login-label">Mot de passe</label>
                        <input
                            name="password"
                            id="password"
                            type="password"
                            class="form-control tm-login-input @error('password') tm-input-error @enderror"
                            placeholder="••••••••"
                        />
                    </div>

                    <div class="tm-login-field">
                        <label for="password_confirmation" class="tm-login-label">Confirmez le mot de passe</label>
                        <input
                            name="password_confirmation"
                            id="password_confirmation"
                            type="password"
                            class="form-control tm-login-input @error('password_confirmation') tm-input-error @enderror"
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                @error("password")
                <span class="tm-login-error-msg">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn btn-primary tm-login-btn">
                    Modifier mes informations
                </button>

            </form>
        </div>
    </div>
@endsection

