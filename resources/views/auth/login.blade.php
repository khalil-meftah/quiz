@extends('layouts.app')

@section('content')
<div class="container gradient-bg">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="margin-top:2rem ">{{ __('CONNECTION') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addrese Email') }}</label> --}}

                            <div class="col-md-6">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="margin-top:1rem">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label> --}}

                            <div class="col-md-6">
                                <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"style="margin-top:2rem">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="opacity:1;font-weight:bolder;">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        {{-- </div> --}}

                        <div class="row mb-0" >
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('se connecter') }}
                                </button>

                                <div class="reset">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                   
                                    </a>
                                    @endif
                                </div>
                                
                                @if (Route::has('register'))
                               <div class="registration">
                                <span>vous n'avez pas de compte veuillez <span>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('vous Inscrire') }}</a>
                                </div>
                        @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
