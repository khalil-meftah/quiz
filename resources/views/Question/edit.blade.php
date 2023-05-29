<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modifier question</title>
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
    <h1 class="h1 mb-4">Modifier votre question</h1>
        <form action="{{ route('question.update', $question->id) }}" method="post" class="create-form"> 
            @csrf
            @method('PUT')
            <textarea name="descriptionQuestion" id="question-input-update" placeholder="Question">{{ $question->descriptionQuestion }}</textarea>

            @isset( $chapitres )
                <select name="chapitre_id" id="chapitre_id">
                    <option value="">Sélectionnez le chapitre</option>

                    @foreach($chapitres as $chapitre)
                        @if($chapitre->id == $question->chapitre_id)
                            <option value="{{ $chapitre->id }}" selected>{{ $chapitre->nomChapitre }}</option>
                        @else
                            <option value="{{ $chapitre->id }}">{{ $chapitre->nomChapitre }}</option>
                        @endif
                    @endforeach
                </select>
            @endisset

            <div class="submit-reset">
                <button type="submit" class="btn btn-success" value="submit">
                    <img src="{{asset('logo\enregistrer.svg')}}" alt="" />
                    <span>Enregistrer</span>
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