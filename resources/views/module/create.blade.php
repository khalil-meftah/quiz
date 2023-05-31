<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter un module</title>
  
</head>
<body>
    <x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
    <x-side-nav />
    
    <div id="fake"></div>
    <main class="main">  
    <x-main-nav :title="'module'" :user-role="$userRole"/>
    <div class="main-content create">
    <div id="module-div"></div>

        <h1 class="h1 mb-4">Ajouter un module</h1>
        <form  method="POST" action="{{route('module.store')}}"class="create-form create-module-form">
            @csrf

            <input type="text" name="nomModule" id="nomModule" placeholder="Nom" >

            <input type="text" name="descriptionModule" id="descriptionModule" placeholder="Description">

            <input type="integer" name="nombreHeuresModule" id="nombreHeuresModule" placeholder="Nombre d'heures">

            <label for="dateCreationModule" class="label">Date de creation</label>
            <input type="date" name="dateCreationModule" id="dateCreationModule">

            <label for="dateDebutModule" class="label">Date de début</label>
            <input type="date" name="dateDebutModule"id="dateDebutModule">

            <div class="submit-reset">
                <button type="submit" value="submit">
                    <img src="{{asset('logo\ajouter.svg')}}" alt="" />
                    <span>Ajouter</span>
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