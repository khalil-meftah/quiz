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
    <table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Date De Naissance</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Mot De Passe</th>
            <th>Action</th>
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
            <td>{{ $user->password }}</td>
            <td>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</html>
