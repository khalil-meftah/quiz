<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page de modification</title>

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
    <x-main-nav :title="'chapitre'" :user-role="$userRole"/>
    <div class="main-content">

        <form  method="POST" action="{{route('chapitre.update',$chapitre->id)}}">
            @csrf
            @method('patch')
            <label for="nomChapitre">nom du Chapitre</label>
            <input type="text" name="nomChapitre" id="nomChapitre" value='{{$chapitre->nomChapitre}}'><br>

            <label for="descriptionChapitre">description Chapitre</label>
            <input type="text" name="descriptionChapitre"  value ="{{$chapitre->descriptionChapitre}}" id="descriptionChapitre"><br>

            <label for="nbh">nombre Heures Chapitre</label>
            <input type="integer" name="nombreHeuresChapitre"  value ="{{$chapitre->nombreHeuresChapitre}}" id="nombreHeuresChapitre"><br>

            <label for="dateCreationChapitre">date Creation Chapitre</label>
            <input type="date" name="dateCreationChapitre"  value ="{{$chapitre->dateCreationChapitre}}" id="dateCreationChapitre"><br>

            <label for="dateDebutChapitre">date Debut Chapitre</label>
            <input type="date" name="dateDebutChapitre" value ="{{$chapitre->dateDebutChapitre}}" id="dateDebutChapitre"><br>
            
            <label for="module_id">Module ID</label>
            <select name="module_id" id="module_id">
                <option>-- Selectionner Module --</option>
                @foreach($modules as $module)
                <option value="{{$module->id}}">{{$module->nomModule}}</option>
                @endforeach
            </select><br>

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
    </div>
    </main>
</body>
</html>