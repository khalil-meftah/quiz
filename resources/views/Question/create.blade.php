<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter une question</title>
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
    <x-main-nav :title="'question'" :user-role="$userRole"/>
    
    <div class="main-content create">
        <h1 class="h1 mb-4">Ajouter une question</h1>
        <form action="{{route('question.store')}}" method="post" class="create-form create-question-form">
            @csrf
            
            <textarea name="descriptionQuestion" id="question-input" placeholder="Question ..."></textarea>

            @isset( $modules , $chapitres )
                <select name="module" id="module">
                    <option value="">Sélectionnez le module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
                    @endforeach
                </select>
                <select name="chapitre" id="chapitre" disabled>
                    <option value="">Sélectionnez le chapitre</option>
                </select>
            @endisset
            <div class="submit-reset">
                <button type="submit" class="btn btn-success" value="submit">
                    <img src="{{asset('logo\ajouter.svg')}}" alt="" />
                    <span>Ajouter</span>
                </button>
                <button type="reset" class="btn btn-danger" value="reset">
                    <img src="{{asset('logo\annuler.svg')}}" alt="" />
                    <span>Annuler</span>
                </button>
            </div>
        </form>
        
    </div>
    </main>
</body>
</html>