<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >

    <title>Dashboard</title>
</head>
<body>

<x-side-nav />
<x-main-nav :title="'question'" />

<div class="main-content">

<table class="main-table">
          <tr>
              <th>id</th>
              <th>descriptionQuestion</th>
              <th>chapitre_id</th>
          </tr>
          @foreach($questions as $question)
          <tr>
              <td>{{ $question->id }}</td>
              <td>{{ $question->descriptionQuestion }}</td>
              <td>{{ $question->chapitre_id }}</td>
              <td>
                  <form action="{{route('question.edit',$question->id )}}" method="get">
                      <button type="submit">Edit</button>
                  </form>
              </td>
              <td>
                  <form action="{{route('question.destroy',$question->id )}}" method="post">
                      @csrf    
                      @method('delete')
                      <button type="submit">Delete</button>
                  </form>
              </td>

          </tr>
          @endforeach
      </table>
      
      <div class="pagination-links">{{ $questions->onEachSide(1)->links() }}</div>

</div>

</body>
</html>