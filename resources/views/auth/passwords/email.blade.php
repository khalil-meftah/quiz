@extends('layouts.app')

@section('content')       

<div class="form">

    <h1>Réinitialiser le mot de passe</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="email">
                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <div class="alert invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <button type="submit">Envoyer le lien de réinitialisation</button>

    </form>
</div>

@endsection
