
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
        <th>nom du module</th>
        <th>description du module</th>
        <th>nombre d'heures du module</th>
        <th>date de début du module </th>
        <th>date de céation du module</th>
    </tr>

    @foreach ($mod as $mod)
    <tr>
        <td> {{$mod->nomModule}}</td>
        <td> {{$mod->descriptionModule}}</td>
        <td> {{$mod->nombreHeuresModule}}</td>
        <td> {{$mod->dateDebutModule}}</td>
        <td> {{$mod->dateCreationModule}}</td>
        <td> 
            <form action="{{route('module.edit', $mod->id)}}">
                @csrf
                @method('PUT')
                <button type="submit">modifier</button>
            </form>
        </td>

        <td>
            <form action="{{route('module.destroy', $mod->id)}}" method ="post">   
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