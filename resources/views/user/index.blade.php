<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>liste utilisateurs</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
    
    <table class="main-table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Date De Naissance</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Mot De Passe</th>
        </tr>
        @if(Auth::check())
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->prenom}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->dateDeNaissance}}</td>
            <td>{{$user->numeroDeTelephone}}</td>
            <td>{{$user->adresse}}</td>
            <td>{{$user->password}}</td>
            <td>
                <form action="{{route('profile.edit', $user->id)}}">
                    @csrf
                    @method('PUT')
                    <button type="submit">Modifier</button>
                </form>
            </td>
            <td>
                <form action="{{route('user.destroy', $user->id)}}" method ="post">   
                    @csrf
                    @method('delete')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        
@endif
            </table>
</body>
</html>