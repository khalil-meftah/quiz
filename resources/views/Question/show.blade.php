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
    <!-- <p>id: {{ $question->id }}</p>
    <p>decriptionQuestion: {{ $question->descriptionQuestion }}</p>
    <a href="{{route('question.edit',$question->id )}}">edit</a> -->
    <h2>{{ $questionWithResponses->title }}</h2>
    <p>{{ $questionWithResponses->body }}</p>
    <h3>Responses:</h3>
    <ul>
        @foreach($questionWithResponses->responses as $response)
            <li>{{ $response->body }}</li>
        @endforeach
    </ul>

    <form action="{{route('question.destroy',$question->id )}}" method="post">
    @csrf    
    @method('delete')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
</body>
</html>