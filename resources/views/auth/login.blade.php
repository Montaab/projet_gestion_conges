<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Login') }}</title>
    <style>
        body {
            background-image: url('/assets/img/background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .input-style {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            background-color: transparent;
            color: #f0f0f0;
            outline: none;
            font-size: 18px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .btn-primary {
            width: 100%;
            height: 45px;
            border-radius: 30px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.9rem;
            color: #dc3545;
        }
    </style>
</head>

<body>

<div class="card shadow-lg">
                <div class="card-header text-center font-weight-bold">{{ __('Connexion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

    <div class="login-card">
        <img src="{{ asset('assets/img/postetun.png') }}" alt="Poste Tunisienne" style="max-width: 150px; margin-bottom: 20px;">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Champ Matricule -->
            <div class="mb-3">
                <label for="matricule" class="form-label">{{ __('Matricule') }}</label>
                <input id="matricule" type="text" class="input-style @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule" autofocus>
                @error('matricule')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" class="input-style @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Checkbox "Se souvenir de moi" -->
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Se souvenir de moi') }}
                </label>
            </div>

            <!-- Bouton de connexion -->
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary py-2">
                    {{ __('Se connecter') }}
                </button>
            </div>

            <!-- Lien mot de passe oublié -->
            <div class="text-center mt-3">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>

</body>

</html>
