@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
{{--------------------------------------------------------- NAME------------------------------------------ --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- ----------------------------------------------------PRENOM------------------------------------------------------------------------ --}}
<div class="row mb-3">
    <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

    <div class="col-md-6">
        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

        @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- ----------------------------------------------------EMAIL---------------------------------------------------- --}}
<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- -----------------------------------------------------ROLE---------------------------------------------------------------- --}}
<div class="row mb-3">
    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

    <div class="col-md-6">
        <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required autocomplete="role" autofocus>
            <option value="professeur">Professeur</option>
            <option value="mainteneur">Mainteneur</option>
            <option value="administrateur">Administrateur</option>
        </select>

        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- -----------------------------------------------DATE DE NAISSANCE----------------------------------------- --}}
<div class="row mb-3">
    <label for="dateDeNaissance" class="col-md-4 col-form-label text-md-end">{{ __('Date De Naissance') }}</label>

    <div class="col-md-6">
        <input id="dateDeNaissance" type="date" class="form-control @error('dateDeNaissance') is-invalid @enderror" name="dateDeNaissance" value="{{ old('dateDeNaissance') }}" required autocomplete="dateDeNaissance" autofocus>

        @error('dateDeNaissance')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- ----------------------------------------------TELEPHONE----------------------------------------- --}}
<div class="row mb-3">
    <label for="numeroDeTelephone" class="col-md-4 col-form-label text-md-end">{{ __('Téléphone') }}</label>

    <div class="col-md-6">
        <input id="numeroDeTelephone" type="tel" class="form-control @error('numeroDeTelephone') is-invalid @enderror" name="numeroDeTelephone" value="{{ old('numeroDeTelephone') }}" required autocomplete="numeroDeTelephone" autofocus>

        @error('numeroDeTelephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- -----------------------------------------------------ADRESSE---------------------------------------------------------------- --}}
<div class="row mb-3">
    <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

    <div class="col-md-6">
        <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

        @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




{{-- -------------------------------------------------MOT DE PASSE ------------------------------------------- --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot De Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- -------------------------------------------------CONFIRMATION MOT DE PASSE --------------------------------------- --}}
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer votre Mot De Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
{{-- ---------------------------------------------------BOUTON D'ENVOIE--------------------------------------------------------- --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
