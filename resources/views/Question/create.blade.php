<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Ajouter une question</title>

</head>
<body>
    <x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
    <x-side-nav />
    <div id="fake"></div>
    <main class="main"> 
    <x-main-nav :title="'question'" :user-role="$userRole"/>
    
    <div class="main-content create">
        <div id="question-reponse-div"></div>

        <h1 class="h1 mb-4">Ajouter une question</h1>
        <form action="{{route('question.store')}}" method="post" class="create-form create-question-form">
            @csrf
            
            <textarea name="descriptionQuestion" id="question-input" placeholder="Question ..." required></textarea>

            @isset( $modules , $chapitres )
                <select name="module" id="module" required>
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
        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
    </div>
    </main>
    <x-links/>
</body>
</html>