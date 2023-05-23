<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajoutez chapitre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" > 
</head>
<body>
    @php
        $userRole = auth()->user()->role;
    @endphp
    <x-side-nav />
    <x-main-nav :title="'chapitre'" :user-role="$userRole"/>
    <div class="main-content">
        <form  method="POST" action="{{route('chapitre.store')}}">
            @csrf

            <label for="nomChapitre">nom du Chapitre</label>
            <input type="text" name="nomChapitre" id="nomChapitre"><br>

            <label for="descriptionChapitre">description Chapitre</label>
            <input type="text" name="descriptionChapitre" id="descriptionChapitre"><br>

            <label for="nbh">nombre Heures Chapitre</label>
            <input type="integer" name="nombreHeuresChapitre" id="nombreHeuresChapitre"><br>

            <label for="dateCreationChapitre">date Creation Chapitre</label>
            <input type="date" name="dateCreationChapitre" id="dateCreationChapitre"><br>

            <label for="dateDebutChapitre">date Debut Chapitre</label>
            <input type="date" name="dateDebutChapitre"id="dateDebutChapitre"><br>

            <label for="module_id">Module ID</label>
            <select name="module_id" id="module_id">
                <option>-- Selectionner Module --</option>
                @foreach($modules as $module)
                <option value="{{$module->id}}">{{$module->nomModule}}</option>
                @endforeach
            </select><br>

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
