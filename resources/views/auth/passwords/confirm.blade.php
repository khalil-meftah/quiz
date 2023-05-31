@extends('layouts.app')

@section('content')

<div class="form">
    <h1>Confirmez le mot de passe</h1>
    <p>Veuillez confirmer votre mot de passe avant de continuer.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="password">
            <input placeholder="Email" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Confirmez le mot de passe</button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié?</a>
        @endif

    </form>
</div>

@endsection
