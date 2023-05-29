<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Confirmation des utilisateurs</title>
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
            <th>status</th>
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
            <td>{{ $user->status }}</td>

            
            <td>
                <form action="{{route('user.validate', $user->id)}}" method ="post">   
                    @csrf
                    @method('PATCH')
                <button type="submit">valider</button>
                </form>
            </td>
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
</main>
</body>
</html>
