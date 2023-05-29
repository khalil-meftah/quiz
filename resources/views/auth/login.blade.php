@extends('layouts.app')

@section('content')
<div class="container gradient-bg">

<div class="form">


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- email -->
            <div class="email">
            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <!-- mot de pass -->
            <div class="password">
            <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <!-- remember me -->
            <div class="remember-me">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember" >Se souvenir de moi</label>
            </div>

            <button type="submit" class="">Se connecter</button>
            
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
            @endif
            <div class="button">
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
            @endif
            </div>

    </form>
</div>
@endsection
