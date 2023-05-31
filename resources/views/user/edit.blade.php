<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modifier profile</title>
</head>
<body>
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'profile'" :user-role="$userRole"/>
<div class="main-content create">
<div id="profile-div"></div>

    <h1 class="h1 mb-4">Modifier profile</h1>

    <form action="{{ route('membre.update', $user->id)}}" method="POST" class="create-form create-profile-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$user->id}}">
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


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="icon" href="logo\quiz.svg" type="image/png" sizes="16x16">

    <title>Modifier profile</title>
   
</head>
<body>
<div class="container-fluid">
    <form action="{{route('profile.update', $user->id)}}" method="post">

    @csrf
    @method('PATCH')
    <input type="hidden" name="id" value="{{ $user->id }}">
  
    <label for="name">Nom utilisateur</label>
    <input type="text" name="name" id="name" value='{{$user->name}}'><br>
    
    <label for="prenom">Prénom utilisateur</label>
    <input type="text" name="prenom" id="prenom" value='{{$user->prenom}}'><br>
    
    <label for="role">Role</label>
    
    <label for="role">Role</label>
            <select id="role" name="role">
                <option value="professeur" {{$user->role == 'professeur' ? 'selected' : ''}}>Professeur</option>
                <option value="mainteneur" {{$user->role == 'mainteneur' ? 'selected' : ''}}>Mainteneur</option>
                <option value="administrateur" {{$user->role == 'administrateur' ? 'selected' : ''}}>Administrateur</option>
            </select>
            <br>
    <label for="dateDeNaissance">Date de Naissance</label>
    <input type="date" name="dateDeNaissance" id="dateDeNaissance" value='{{$user->dateDeNaissance}}'><br>
    
    
    <label for="email">Email</label>
    <input type="text"  name="email" id="email" value='{{$user->email}}'><br>
    
    <label for="numeroDeTelephone">numeroDeTelephone</label>
    <input type="text" name="numeroDeTelephone" id="numeroDeTelephone" value='{{$user->numeroDeTelephone}}'><br>
    
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" value='{{$user->adresse}}'><br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" value='{{$user->password}}'><br>
    
    <label for="password-confirm">confirmer mot de passe</label>
    <input id="password-confirm" type="password"  name="password_confirmation" value='{{$user->password}}'><br>
    

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

</body>
</html> -->