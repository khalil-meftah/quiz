<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >



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

<div class="main-content">

<table class="main-table">

        <tr>
            <th>nom de chapitre</th>
            <th >description du chapitre</th>
            <th>nombres d'heures</th>
            <th>date début de chapitre</th>
            <th>date de création du chapitre</th>
            <th>module id</th>
        </tr>

        @foreach ($chapitres as $chapitre)

        <tr>
            <td>{{$chapitre->nomChapitre}}</td>
            <td>{{$chapitre->descriptionChapitre}}</td>
            <td>{{$chapitre->nombreHeuresChapitre}}</td>
            <td>{{$chapitre->dateDebutChapitre}}</td>
            <td>{{$chapitre->dateCreationChapitre}}</td>
            <td>{{$chapitre->module_id}}</td> 
            <td>
                <form action="{{route('chapitre.edit', $chapitre->id)}}">
                    @csrf
                    @method('PUT')
                    <button type="submit">modifier</button>
                </form>
            </td>
                
            <td>
                <form action="{{route('chapitre.destroy', $chapitre->id)}}" method ="post">   
                    @csrf
                    @method('delete')
                <button type="submit">supprimer</button>
                </form>
            </td>
        </tr> 

        @endforeach
</table>
</div>

</body>
</html>