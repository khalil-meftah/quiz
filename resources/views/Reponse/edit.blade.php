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
    <x-side-nav />
    <x-main-nav :title="'reponse'" />
    <div class="container p-3 main-content">
        <h1 class="h1 mb-4">Reponse</h1>
        <form action="{{ route('reponse.update', $reponse->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="descriptionReponse">descriptionReponse</label>
            <textarea name="descriptionReponse">{{ $reponse->descriptionReponse }}</textarea><br><br>

            <label for="valeurReponse">Valeur reponse</label><br>
            
            <input type="radio" name="valeurReponse" value="1" @if($reponse->valeurReponse == "1") checked @endif>
            <label>Vrai</label>

            <input type="radio" name="valeurReponse" value="0" @if($reponse->valeurReponse == "0") checked @endif>
            <label>Faux</label>
            
            <br><br>
            <label>Question id</label>

            <select name="question_id" id="question_id">
            <option value="{{$question->id}}" @if($question->id === $question->id) selected @endif>
                {{$question->descriptionQuestion}}
            </option>
            </select>
            <br><br>

            <input type="submit" class="btn btn-success" value="submit">
            <input type="reset" class="btn btn-danger" value="reset">
        </form>
        <br><br>
    </div>
</body>
</html>