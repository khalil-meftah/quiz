<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >


    <title>Dashboard</title>
</head>
<body>

<div class="sidenav">
  <a href="{{route('question.index')}}">Question</a>
  <a href="{{route('reponse.index')}}">Reponse</a>
  <a href="{{route('chapitre.index')}}">Chapitre</a>
  <a href="{{route('module.index')}}">Module</a>
  <a href="">Users</a>
  <a href="{{route('quiz-generator')}}">Generate Quiz</a>
</div>

  <div class="main-nav">
    <a href="">Consulter</a>
    <a href="">Ajouter</a>
    <a href="">Confirmer</a>
  </div>



</body>
</html>