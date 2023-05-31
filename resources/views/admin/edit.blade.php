<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modifier utilisateur</title>
</head>
<body>
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'user'" :user-role="$userRole"/>
<div class="main-content create">
<div id="user-div"></div>

    <h1 class="h1 mb-4">Modifier utilisateur</h1>

    <form action="{{ route('user.update', $user->id)}}" method="POST" class="create-form create-user-form">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="Nom" value="{{$user->name}}" required>
    
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="{{$user->prenom}}" required>
    
        <input type="email" name="email" id="email" placeholder="Email" value="{{$user->email}}" required>
        
        <label for="role" class="label">Role</label>
        <select id="role" name="role">
            <option value="professeur" {{$user->role == 'professeur' ? 'selected' : ''}}>Professeur</option>
            <option value="mainteneur" {{$user->role == 'mainteneur' ? 'selected' : ''}}>Mainteneur</option>
            <option value="administrateur" {{$user->role == 'administrateur' ? 'selected' : ''}}>Administrateur</option>
        </select>
   
        <label for="dateDeNaissance" class="label">Date de naissance</label>
        <input type="date" name="dateDeNaissance" id="dateDeNaissance" placeholder="Date de naissance" value="{{$user->dateDeNaissance}}" required>
    
        <input type="text" name="numeroDeTelephone" id="numeroDeTelephone" placeholder="Numero de téléphone" value="{{$user->numeroDeTelephone}}" required>
    
        <input type="text" name="adresse" id="adresse" placeholder="Adresse" value="{{$user->adresse}}" required>
        
        <label for="status" class="label">Status:</label>
        <div class="double-input">
            <div>           
                <input type="radio" name="status" id="status" value="0" {{$user->status == 0 ? 'checked' : null}}>
                <label for="status">Inactif</label>
            </div>
            <div>
                <input type="radio" name="status" id="status" value="1" {{$user->status == 1 ? 'checked' : null}}>
                <label for="status">Actif</label>
            </div>
        </div>

        <input type="password" name="password" id="password" placeholder="Nouveau mot de passe">
         
        <input id="password-confirm" type="password"  name="password_confirmation" placeholder="Confirmer le mot de passe">

        <div class="submit-reset">
                <button type="submit" value="submit">
                    <img src="{{asset('logo\enregistrer.svg')}}" alt="" />
                    <span>Enregistrer</span>
                </button>
                <button type="reset" value="reset">
                    <img src="{{asset('logo\annuler.svg')}}" alt="" />
                    <span>Annuler</span>
                </button>
        </div>

    </form>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
    </div>
</div>
</main>
<x-links/>
</body>
</html>