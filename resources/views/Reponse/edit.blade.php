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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modifier réponse</title>
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
    <x-main-nav :title="'reponse'" :user-role="$userRole"/>
    <div class="main-content create">
        <h1 class="h1 mb-4">Modifier votre réponse</h1>
        <form action="{{ route('reponse.update', $reponse->id) }}" method="post">
            @csrf
            @method('PUT')
            <textarea name="descriptionReponse" placeholder="Réponse ...">{{ $reponse->descriptionReponse }}</textarea>

            <label for="valeurReponse" class="label">Valeur</label>

            <div class="valeur-reponse">
                <div>
                    <input type="radio" name="valeurReponse" value="1" @if($reponse->valeurReponse == "1") checked @endif>
                    <label>Vrai</label>
                </div>
                <div>
                    <input type="radio" name="valeurReponse" value="0" @if($reponse->valeurReponse == "0") checked @endif>
                    <label>Faux</label>
                </div>
            </div>
            
            <label class="label">Question id</label>
            <select name="question_id" id="question_id">
            @foreach($questions as $question)
                        @if($question->id == $reponse->question_id)
                            <option value="{{ $question->id }}" selected>{{ $question->descriptionQuestion }}</option>
                        @else
                            <option value="{{ $question->id }}">{{ $question->descriptionQuestion }}</option>
                        @endif
            @endforeach
            </select>

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