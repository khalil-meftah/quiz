<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficherQuestion</title>
</head>
<body>
<div>
        <table>
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
                    <a href="{{route('question.edit',$q->id )}}">edit</a>
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
</body>
</html>