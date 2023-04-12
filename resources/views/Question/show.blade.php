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
<div>

               
                <p>id: {{ $question->id }}</p>
                <p>decriptionQuestion: {{ $question->descriptionQuestion }}</p>
                <a href="{{route('question.edit',$question->id )}}">edit</a>

                <form action="{{route('question.destroy',$question->id )}}" method="post">
                @csrf    
                @method('delete')
                    <button type="submit">Delete</button>
                </form>

</body>
</html>
</body>
</html>