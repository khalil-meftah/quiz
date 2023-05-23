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
    <title>ajouterReponse</title>
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
    <x-side-nav />
    <x-main-nav :title="'reponse'" :user-role="$userRole"/>
    <div class="container p-3 main-content">
        <h1 class="h1 mb-4">Reponse</h1>
        <form action="{{route('reponse.store')}}" method="post">
            @csrf
            <label for="descriptionReponse">descriptionReponse</label>
            <textarea name="descriptionReponse"></textarea><br><br>

            <label for="valeurReponse">Valeur reponse</label><br>
            <input type="radio" name="valeurReponse" value="1">
            <label>Vrai</label>
            <input type="radio" name="valeurReponse" value="0">
            <label>Faux</label>
            <br>
            <br>
            <label for="question_id">question ID</label>
            <select name="question_id" id="question_id">
            <option value="{{$question->id}}" @if($question->id === $question->id) selected @endif>
                {{$question->descriptionQuestion}}
            </option>
            </select>

            <br>
            <br>

            <br><br>
            <input type="submit" class="btn btn-success" value="submit">
            <input type="reset" class="btn btn-danger" value="reset">
        </form>
        <br><br>
    </div>
</body>
</html>