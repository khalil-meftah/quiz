@extends('layouts.app')

@section('content')
<div class="container gradient-bg">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('S\'incrire') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


{{--------------------------------------------------------- NAME------------------------------------------ --}}
<div class="form-group">
            <div class="row mb-3">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label> --}}

                            <div class="col-md-6">
                                <input placeholder="Nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- ----------------------------------------------------PRENOM------------------------------------------------------------------------ --}}
<div class="row mb-3" >
    {{-- <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label> --}}

    
    <div class="col-md-6">
        <input placeholder="Prénom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

        @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
{{-- ----------------------------------------------------EMAIL---------------------------------------------------- --}}
<div class="row mb-3">
    {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse Email') }}</label> --}}

    <div class="col-md-6">
        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- -----------------------------------------------------ROLE---------------------------------------------------------------- --}}
<div class="row mb-3">
    {{-- <label for="role" class="RoleLabel" style="margin-left:2.5rem">{{ __(' Role') }}</label> --}}
    <div class="col-md-6">
        <div class="input-wrapper">
            <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required autocomplete="role" autofocus style="color:#373B61">
                <option selected disabled>Role</option>
                <option value="professeur">Professeur</option>
                <option value="mainteneur">Mainteneur</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- -----------------------------------------------DATE DE NAISSANCE----------------------------------------- --}}
<div class="form-group">
<div class="row mb-3">
    {{-- <label for="dateDeNaissance" class="col-md-4 col-form-label text-md-end">{{ __('Date De Naissance') }}</label> --}}

    <div class="col-md-6">
        <input placeholder="Date de naissance" value="" id="dateDeNaissance" type="text" class="form-control @error('dateDeNaissance') is-invalid @enderror" name="dateDeNaissance" value="{{ old('dateDeNaissance') }}" required autocomplete="dateDeNaissance" autofocus onfocus="(this.type='date')" onblur="if(this.value)" this.type='text'>

        @error('dateDeNaissance')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- ----------------------------------------------TELEPHONE----------------------------------------- --}}
<div class="row mb-3">
    {{-- <label for="numeroDeTelephone" class="col-md-4 col-form-label text-md-end">{{ __('Téléphone') }}</label> --}}

    <div class="col-md-6">
        <input placeholder="Téléphone" id="numeroDeTelephone" type="tel" class="form-control @error('numeroDeTelephone') is-invalid @enderror" name="numeroDeTelephone" value="{{ old('numeroDeTelephone') }}" required autocomplete="numeroDeTelephone" autofocus>

        @error('numeroDeTelephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
</div>
{{-- -----------------------------------------------------ADRESSE---------------------------------------------------------------- --}}
<div class="row mb-3">
    {{-- <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label> --}}

    <div class="col-md-6">
        <input placeholder="Adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

        @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




{{-- -------------------------------------------------MOT DE PASSE ------------------------------------------- --}}
                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot De Passe') }}</label> --}}

                            <div class="col-md-6">
                                <input placeholder="Mot De Passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- -------------------------------------------------CONFIRMATION MOT DE PASSE --------------------------------------- --}}
                        <div class="row mb-3" style="margin-bottom:2rem ">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer votre Mot De Passe') }}</label> --}}

                            <div class="col-md-6">
                                <input placeholder="Confirmer votre Mot De Passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                            </div>
                        </div>
{{-- ---------------------------------------------------BOUTON D'ENVOIE--------------------------------------------------------- --}}
                        <div class="rowmb-0">
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Créer votre compte') }}
                                </button>
                            
                            {{-- </div> --}}
                            @guest   
                                 <span>vous avez un compte ? veuillez </span>  
                            <a class="nav-link" href="{{ route('login') }}">{{ __('vous Connecter') }}</a>
                         @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
