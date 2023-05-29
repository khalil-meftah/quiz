<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajoutez Module</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

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
    <x-main-nav :title="'module'" :user-role="$userRole"/>
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
   
    </main>
</body>
</html>