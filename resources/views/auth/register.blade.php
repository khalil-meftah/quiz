@extends('layouts.app')

@section('content')


<div class="form">
<h1>Créer un compte</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf


{{--------- NAME----------------------}}
<div class="name">
    
    <input placeholder="Nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

{{--------------PRENOM--------------------}}

        <input placeholder="Prénom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

        @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
{{--------------------EMAIL----------------------}}


    
        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    

{{---------------------ROLE-------------}}


        <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required autocomplete="role" autofocus style="color:#373B61">
            <option selected disabled>Role</option>
            <option value="professeur">Professeur</option>
            <option value="mainteneur">Mainteneur</option>
            <option value="administrateur">Administrateur</option>
        </select>
    
    @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    



{{------------------DATE DE NAISSANCE--------------------}}
<div class="form-group">
    
    <input placeholder="Date de naissance" value="" id="dateDeNaissance" type="text" class="form-control @error('dateDeNaissance') is-invalid @enderror" name="dateDeNaissance" value="{{ old('dateDeNaissance') }}" required autocomplete="dateDeNaissance" autofocus onfocus="(this.type='date')" onblur="if(this.value)" this.type='text'>

    @error('dateDeNaissance')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    

{{---------------TELEPHONE------------------------------}}

<input placeholder="Téléphone" id="numeroDeTelephone" type="tel" class="form-control @error('numeroDeTelephone') is-invalid @enderror" name="numeroDeTelephone" value="{{ old('numeroDeTelephone') }}" required autocomplete="numeroDeTelephone" autofocus>

@error('numeroDeTelephone')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    


{{--------------ADRESSE--------------------}}

    
<input placeholder="Adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

@error('adresse')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    

{{--------------------MOT DE PASSE ------------------}}

    <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
                            
                        
{{---------------------CONFIRMATION MOT de passe ---------------------}}
    
    <input placeholder="Confirmer votre Mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                            
                        
{{----------------BOUTON D'ENVOIE-----------------------}}

    <button type="submit" class="btn btn-primary" >
        {{ __('Créer votre compte') }}
    </button>
    

    @guest
    <div class="link">
    <span>Vous avez un compte ? veuillez vous</span>
    <a href="{{ route('login') }}">{{ __('Connecter') }}</a>
    </div> 
    @endguest

</form>
</div>
    
@endsection
