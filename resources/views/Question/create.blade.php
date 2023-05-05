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
    <title>ajouterQuestion</title>
</head>
<body>

    <x-side-nav />
    <x-main-nav :title="'question'" />
    
    <div class="container p-3 main-content">
        <h1 class="h1 mb-4">Question</h1>
        <form action="{{route('question.store')}}" method="post">
            @csrf
            <label for="descriptionQuestion">descriptionQuestion</label>
            <textarea name="descriptionQuestion"></textarea>
            <br>
            <br>

            <label for="chapitre_id">chapitre ID</label>
            <select name="chapitre_id" id="chapitre_id">
                <option>-- Selectionnerchapitre --</option>
                @foreach($chapitres as $chapitre)
                <option value="{{$chapitre->id}}">{{$chapitre->nomChapitre}}</option>
                @endforeach
            </select>
            <br>
            <br>

            <input type="submit" class="btn btn-success" value="submit">
            <input type="reset" class="btn btn-danger" value="reset">
        </form>
        <br><br>
    </div>
</body>
</html>