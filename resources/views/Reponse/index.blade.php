<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficherReponse</title>
</head>
<body>
<div>
        <table>
            <tr>
                <th>id</th>
                <th>descriptionReponse</th>
                <th>descriptionReponse</th>
                <th>descriptionReponse</th>

                
            </tr>
            @foreach($reponse as $r)
            <tr>
               
                <td>{{ $r->id }}</td>
                <td>{{ $r->descriptionReponse }}</td>
                <td>{{ $r->valeurReponse }}</td>
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
</body>
</html>