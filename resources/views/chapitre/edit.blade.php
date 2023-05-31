<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter un chapitre</title>
</head>
<body>
    <x-loader/>
    @php
        $userRole = auth()->user()->role;
    @endphp
    <x-side-nav />
    <div id="fake"></div>
    <main class="main">
    <x-main-nav :title="'chapitre'" :user-role="$userRole"/>
    <div class="main-content create">
    <div id="chapitre-div"></div>

        <h1 class="h1 mb-4">Modifier chapitre</h1>
        <form  method="post" action="{{route('chapitre.update', $chapitre->id)}}"  class="create-form create-question-form">
            @csrf
            @method('PUT')
            <input type="text" name="nomChapitre" id="nomChapitre" placeholder="Nom" value='{{$chapitre->nomChapitre}}'>

            <input type="text" name="descriptionChapitre" id="descriptionChapitre" placeholder="Description" value ="{{$chapitre->descriptionChapitre}}">

            <input type="integer" name="nombreHeuresChapitre" id="nombreHeuresChapitre" placeholder="Nombre d'heures"  value ="{{$chapitre->nombreHeuresChapitre}}" >

            <label for="dateCreationChapitre" class="label">Date de création</label>
            <input type="date" name="dateCreationChapitre" id="dateCreationChapitre" placeholder="Date de création" value ="{{$chapitre->dateCreationChapitre}}">

            <label for="dateDebutChapitre" class="label">Date de début</label>
            <input type="date" name="dateDebutChapitre"id="dateDebutChapitre" placeholder="Date de début" value ="{{$chapitre->dateDebutChapitre}}">

            <label for="module_id" class="label">Module</label>
            <select name="module_id" id="module_id">
                <option>Séléctionner le module</option>
                @foreach($modules as $module)
                    <option value="{{$module->id}}" @if($module->id == $chapitre->module_id) selected @endif>{{$module->nomModule}}</option>
                @endforeach
            </select>

            <div class="submit-reset">
                <button type="submit" value="submit">
                    <img src="{{asset('logo\enregistrer.svg')}}" alt="" />
                    <span>Enregistrer</span>
                </button>
                <button type="reset" value="reset">
                    <img src="{{asset('logo\annuler.svg')}}" alt="" />
                    <span>Annuler</span>
                </button>
            </div>
        </form>

        @if ($errors->any() )
        <div class="errors">
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
    <x-links/>
</body>
</html>
