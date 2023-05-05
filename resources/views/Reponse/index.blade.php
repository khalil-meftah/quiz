<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >



    <title>Dashboard</title>
</head>
<body>
<x-side-nav />
<x-main-nav :title="'reponse'" />

<div class="main-content">
    <table class="main-table">
            <tr>
                <th>id</th>
                <th>descriptionReponse</th>
                <th>valeurReponse</th>
                <th>question_id</th>
            </tr>
            @foreach($reponses as $reponse)
            <tr>
               
                <td>{{ $reponse->id }}</td>
                <td>{{ $reponse->descriptionReponse }}</td>

                @if($reponse->valeurReponse == "1")
                <td class="green">Vrai</td>
                @elseif($reponse->valeurReponse == "0")
                <td class="red">Faux</td>
                @endif

                <td>{{ $reponse->question_id }}</td>

                <td>
                  <form action="{{route('reponse.edit',$reponse->id )}}" method="get">
                      <button type="submit">Edit</button>
                  </form>
              </td>
                <td>
                    <form action="{{route('reponse.destroy',$reponse->id )}}" method="post">
                    @csrf    
                    @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="pagination-links">{{ $reponses->onEachSide(1)->links() }}</div>

</div>


</body>
</html>