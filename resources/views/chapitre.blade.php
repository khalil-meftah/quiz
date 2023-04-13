{{-- -----------showing the chapitres--------------------- --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('chapitre.create')}}">Ajoutez chapitre</a>

 
<table>
        <tr  >
            <td >desc chap</td>
            <td>nbr Heures</td>
            <td>debut chap</td>
            <td>creation chap</td>
        </tr>
        <tr>
            @foreach ($chap as $chapp)
            <td>{{$chapp->descriptionChapitre}}</td>
            <td>{{$chapp->nombreHeuresChapitre}}</td>
            <td>{{$chapp->dateDebutChapitre}}</td>
            <td>{{$chapp->dateCreationChapitre}}</td>
            <td><a href="{{route("chapitre.edit", $chapp->id)}}">modifier</a></td>
            
        <td><form action="{{route("chapitre.destroy", $chapp->id)}}" method ="post">   
        @csrf
            @method('delete')
            <button type="submit">DELETE</button></td>
        </form> </tr> 
@endforeach


</table>

    
</body>
</html>