<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficherQuestion</title>
</head>
<body>
<style>
table, th, td {
  border:1px solid black;
}
.green{
    background-color: green;
    color: white;
}
.red{
    background-color: red;
    color: white;
}
</style>
    <p>ID: {{$questionWithResponses->id}}</p>
    <p> Description Reponses       {{$questionWithResponses->descriptionQuestion}}</p>
    <br><br>
    <table>
            <tr>
                <th>id</th>
                <th>descriptionReponse</th>
                <th>valeurReponse</th>
                <th>question_id</th>
            </tr>
            @foreach($questionWithResponses->reponses as $r)
            <tr>
               
                <td>{{ $r->id }}</td>
                <td>{{ $r->descriptionReponse }}</td>
                @if($r->valeurReponse == "1")
                <td class="green">Vrai</td>
                @elseif($r->valeurReponse == "0")
                <td class="red">Faux</td>
                @endif
                <td>{{ $r->question_id }}</td>
                <td>
                    <a href="{{route('reponse.edit',$r->id )}}">edit</a>
                </td>
                
                <td>
                    <form action="{{route('reponse.destroy',$r->id )}}" method="post">
                    @csrf    
                    @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <!-- <td>
                    <a href="{{route('reponse.show',$r->id )}}">show more</a>
                </td> -->

            </tr>
            @endforeach
        </table>
        
    <form action="{{route('question.destroy',$questionWithResponses->id )}}" method="post">
    @csrf    
    @method('delete')
        <button type="submit">Delete Question</button>
    </form>
</body>
</html>
</body>
</html>