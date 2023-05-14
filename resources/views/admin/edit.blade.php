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
    <form action="{{route('user.update', $user->id)}}" method="post">

    @csrf
    @method('PATCH')
  
        <label for="role">Role</label>
      
        <select id="role" name="role" value='{{$user->role}}'>
                <option value="professeur">Professeur</option>
                <option value="mainteneur">Mainteneur</option>
                <option value="administrateur">Administrateur</option>
            </select><br>
       
    <label for="email">Email</label>
        <input type="text"  name="email" id="email" value='{{$user->email}}'><br>
        
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