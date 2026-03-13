<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteco - Créer un compte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/templatemo/css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo/css/custom.css') }}">
</head>
<body class="tm-login-page">

<div class="tm-login-wrapper">
    <div class="tm-login-card">

        <div class="tm-login-header">
            <i class="fas fa-film tm-login-logo-icon"></i>
            <span class="tm-login-logo-text">Biblioteco</span>
        </div>

        <h2 class="tm-login-title">Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}" class="tm-login-form">
            @csrf

            <div class="tm-login-field">
                <label for="surname" class="tm-login-label">Prénom</label>
                <input
                    name="surname"
                    id="surname"
                    type="text"
                    class="form-control tm-login-input"
                    placeholder="Jeanne"
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
                    placeholder="Dupont"
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
                    placeholder="votre@email.com"
                    autocomplete="email"
                />
            </div>
            @error('email')
            <span class="tm-login-error-msg">L'adresse mail est invalide</span>
            @enderror

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
            @error("password")
            <span class="tm-login-error-msg">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary tm-login-btn">
                Créer un compte
            </button>

        </form>
    </div>
</div>

</body>
</html>

