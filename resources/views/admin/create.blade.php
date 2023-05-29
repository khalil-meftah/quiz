<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <script src="{{ asset('js/app.js') }}"></script>
   
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter un utilisateur</title>
    <!-- @viteReactRefresh
    @vite('resources/js/app.js') -->
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'user'" :user-role="$userRole"/>

<div class="main-content">

    <h1 style="text-align: center">Ajouter un utilisateur</h1>

    <form action="{{ route('user.store')}}" method="POST">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name" required><br>
    
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" required><br>
    
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        
        <label for="role">Role:</label>
        <select id="role" name="role" value='role'>
            <option value="professeur">Professeur</option>
            <option value="mainteneur">Mainteneur</option>
            <option value="administrateur">Administrateur</option>
        </select><br>
   
        <label for="dateDeNaissance">Date De Naissance:</label>
        <input type="date" name="dateDeNaissance" id="dateDeNaissance" required><br>
    
        <label for="numeroDeTelephone">Numero De Telephone:</label>
        <input type="text" name="numeroDeTelephone" id="numeroDeTelephone" required><br>
    
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required><br>
        
        <input type="hidden" name="status" id="status" value="0">
        <label for="status">Status:</label>
        <button type="button" onclick="updateStatus(1)">Actif</button>
        <button type="button" onclick="updateStatus(0)">Inactif</button><br>      

        <label for="password">Mot De Passe:</label>
        <input type="password" name="password" id="password" required><br>
         
        <label for="password-confirm">confirmer mot de passe</label>
        <input id="password-confirm" type="password"  name="password_confirmation" ><br>

        <button type="submit">enregistrer modifications</button>
        <button type="reset">annuler</button>

    </form>

    @if ($errors->any() )
    <div >
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
</body>
</html>