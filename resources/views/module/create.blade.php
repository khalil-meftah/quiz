<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajoutez Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >

    
</head>
<body>
    <x-side-nav />
    <x-main-nav :title="'module'" />
    <div class="main-content">
        <form  method="POST" action="{{route('module.store')}}">
            @csrf

            <label for="nomModule">nom du Module</label>
            <input type="text" name="nomModule" id="nomModule"><br>

            <label for="descriptionModule">description Module</label>
            <input type="text" name="descriptionModule" id="descriptionModule"><br>

            <label for="nbh">nombre Heures Module</label>
            <input type="integer" name="nombreHeuresModule" id="nombreHeuresModule"><br>

            <label for="dateCreationModule">date Creation Module</label>
            <input type="date" name="dateCreationModule" id="dateCreationModule"><br>

            <label for="dateDebutModule">date Debut Module</label>
            <input type="date" name="dateDebutModule"id="dateDebutModule"><br>

            <button type="submit">envoyer</button>
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
        </div>
        @endif
    </div>
   
</body>
</html>