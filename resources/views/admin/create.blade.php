<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <script src="{{ asset('js/app.js') }}"></script>
   
    <title>INSERER UTILISATEUR</title>
</head>
<body>
    <h1 style="text-align: center">
        <b>
            INSERER UN UTILISATEUR
        </b>
    </h1>
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
   
</body>
</html>