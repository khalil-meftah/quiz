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
    <a href="{{route('question.create')}}">Ajouter</a>
    <a href="">Confirmer</a>
  </div>


<div class="main-content">

<table class="main-table">
          <tr>
              <th>id</th>
              <th>descriptionQuestion</th>
              <th>chapitre_id</th>

          </tr>
          @foreach($question as $q)
          <tr>
             
              <td>{{ $q->id }}</td>
              <td>{{ $q->descriptionQuestion }}</td>
              <td>{{ $q->chapitre_id }}</td>
              <td>
                  <form action="{{route('question.edit',$q->id )}}" method="post">
                      @csrf    
                      @method('put')
                      <button type="submit">Edit</button>
                  </form>
              </td>
              <td>
                  <form action="{{route('question.destroy',$q->id )}}" method="post">
                      @csrf    
                      @method('delete')
                      <button type="submit">Delete</button>
                  </form>
              </td>
              <td>
                  <a href="{{route('question.show',$q->id )}}">show more</a>
              </td>

          </tr>
          @endforeach
      </table>
</div>

</body>
</html>