<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajoutez membre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" > 
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
</html>