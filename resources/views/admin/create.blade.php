<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter un utilisateur</title>

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

    <h1 class="h1 mb-4">Ajouter un utilisateur</h1>

    <form action="{{ route('user.store')}}" method="POST" class="create-form create-user-form">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nom" required>
    
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" required>
    
        <input type="email" name="email" id="email" placeholder="Email" required>
        
        <label for="role" class="label">Role</label>
        <select id="role" name="role" value='role'>
            <option value="professeur">Professeur</option>
            <option value="mainteneur">Mainteneur</option>
            <option value="administrateur">Administrateur</option>
        </select>
        
        <label for="dateDeNaissance" class="label">Date de naissance</label>
        <input type="date" name="dateDeNaissance" id="dateDeNaissance" placeholder="Date de naissance" required>
    
        <input type="text" name="numeroDeTelephone" id="numeroDeTelephone" placeholder="Numero de téléphone" required>
    
        <input type="text" name="adresse" id="adresse" placeholder="Adresse" required>
        
        <label for="status" class="label">Status:</label>
        <div class="double-input">
            <div>           
                <input type="radio" name="status" id="status" value="0">
                <label for="status">Inactif</label>
            </div>
            <div>
                <input type="radio" name="status" id="status" value="1">
                <label for="status">Actif</label>
            </div>
        </div>

        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
         
        <input id="password-confirm" type="password"  name="password_confirmation" placeholder="Confirmer mot de passe">

        <div class="submit-reset">
                <button type="submit" value="submit">
                    <img src="{{asset('logo\ajouter.svg')}}" alt="" />
                    <span>Ajouter</span>
                </button>
                <button type="reset" value="reset">
                    <img src="{{asset('logo\annuler.svg')}}" alt="" />
                    <span>Annuler</span>
                </button>
        </div>

    </form>

    @if ($errors->any() )
    <div class="errors">
        @foreach(
            $errors->all() as $error
            )
            <li>
                {{$error}}
            </li>
        @endforeach
    @endif
    </div>
</div>
</main>
<x-links/>
</body>
</html>