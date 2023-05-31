@extends('layouts.app')

@section('content')

<div class="form">
    <h1>Réinitialiser le mot de passe</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">


        <div class="email">
            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback alert" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="password">
            <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <p class="invalid-feedback alert" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="password">
            <input placeholder="Confirmer le mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit">Réinitialiser le mot de passe</button>

    </form>
</div>
@endsection
