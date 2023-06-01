@extends('layouts.app')

@section('content')

<div class="form">
        <h1>Se connecter</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- email -->
            <div class="email">
            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <p class="invalid-feedback alert" role="alert">
                    {{ $message }}  
                </p>
            @enderror
            </div>
            <!-- mot de pass -->
            <div class="password">
            <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <p class="invalid-feedback alert" role="alert">
                    {{ $message }}  
                </p>
            @enderror
            </div>

            @if(session('error'))
                <p class="invalid-feedback alert" role="alert">
                    {{ session('error') }}
                </p>
            @endif


            <!-- remember me -->
            <div class="remember-forgot">
                <div class="remember-me">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember" >Se souvenir de moi</label>
                </div>
                <div class="forgot-password ">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                    @endif
                </div>
            </div>

            <button type="submit" >Se connecter</button>
            
                
                @if (Route::has('register'))
                <a class="nav-link register" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                @endif
                

    </form>
</div>
@endsection
