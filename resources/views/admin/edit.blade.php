<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >

    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modifier utilisateur</title>
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
    <div class="container-fluid">
        <form action="{{route('user.update', $user->id)}}" method="post">
            @csrf
            @method('PATCH')
      
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="professeur" {{$user->role == 'professeur' ? 'selected' : ''}}>Professeur</option>
                <option value="mainteneur" {{$user->role == 'mainteneur' ? 'selected' : ''}}>Mainteneur</option>
                <option value="administrateur" {{$user->role == 'administrateur' ? 'selected' : ''}}>Administrateur</option>
            </select>
<br>
           
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{$user->email}}"><br>
    
            <input type="hidden" name="status" id="status" value="0">
            <label for="status">Status:</label>
            <!-- <button type="button" onclick="updateStatus(1)">Actif</button>
            <button type="button" onclick="updateStatus(0)">Inactif</button> -->
            <input type="radio" name="status" id="status" value="0" {{$user->status == 0 ? 'checked' : null}}>
            <label for="status">Inactif</label>
            <input type="radio" name="status" id="status" value="1" {{$user->status == 1 ? 'checked' : null}}>
            <label for="status">Actif</label>


            <br>      
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="{{$user->password}}"><br>
    
            <label for="password-confirm">Confirmer mot de passe</label>
            <input id="password-confirm" type="password" name="password_confirmation" value="{{$user->password}}"><br>
    
            <button type="submit">Enregistrer modifications</button>
            <button type="reset">Annuler</button>
        </form>
    
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
    </div>
</div>
</main>
</body>
</html>