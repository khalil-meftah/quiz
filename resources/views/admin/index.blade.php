<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >

    <title>users</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<x-main-nav :title="'user'" :user-role="$userRole"/>

<div class="main-content">
<table class="main-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Date De Naissance</th>
            <th>Téléphone</th>
            <th>Addresse</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->prenom }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->dateDeNaissance }}</td>
            <td>{{ $user->numeroDeTelephone }}</td>
            <td>{{ $user->adresse }}</td>
            
            <td>
                <form action="{{route('user.edit', $user->id)}}" >
                    @csrf
                    @method('PATCH')
                    <button type="submit">modifier</button>
                </form>
            </td>
     
            <td>
                <form action="{{route('user.destroy', $user->id)}}" method ="post">   
                    @csrf
                    @method('delete')
                <button type="submit">supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody> 
</table>
</div>
</body>
</html>
