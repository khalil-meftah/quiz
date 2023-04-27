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
    <title>afficherReponse</title>
</head>
<body>
               
    <p>id: {{ $reponse->id }}</p>
    <p>decriptionReponse: {{ $reponse->descriptionReponse}}</p>
    <p>valeurReponse: {{ $reponse->valeurReponse }}</p>
    <a href="{{route('reponse.edit',$reponse->id )}}">edit</a>

    <form action="{{route('reponse.destroy',$reponse->id )}}" method="post">
    @csrf    
    @method('delete')
        <button type="submit">Delete</button>
    </form>

</body>
</html>
</body>
</html>