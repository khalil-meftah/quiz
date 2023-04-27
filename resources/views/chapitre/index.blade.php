{{-- -----------showing the chapitres--------------------- --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        th, td {
            border: 1px solid black;
}
    </style>
</head>
<body>
    {{--------------------------RETOUR A LA PAGE DE CREATION--------------------------------------}}
    <a href="{{route('chapitre.create')}}">Ajoutez chapitre</a>

 
<table >
        <tr  >
             <td>nom de chapitre</td>
            <td >description du chapitre</td>
            <td>nombres d'heures</td>
            <td>date début de chapitre</td>
            <td>date de création du chapitre</td>
            <td>module id</td>

        </tr>
        <tr>
            @foreach ($chapitres as $chapitre)
            <td>{{$chapitre->nomChapitre}}</td>
            <td>{{$chapitre->descriptionChapitre}}</td>
            <td>{{$chapitre->nombreHeuresChapitre}}</td>
            <td>{{$chapitre->dateDebutChapitre}}</td>
            <td>{{$chapitre->dateCreationChapitre}}</td>
            <td>{{$chapitre->module_id}}</td>

            
        <td>
            <form action="{{route('chapitre.edit', $chapitre->id)}}">
            
                @csrf
                @method('PUT')
                <button type="submit">modifier</button>
            </form>
        </td>
            
        <td>
            <form action="{{route("chapitre.destroy", $chapitre->id)}}" method ="post">   
                @csrf
                @method('delete')
            <button type="submit">supprimer</button>
        </td>
        </form>
    </tr> 
@endforeach


</table>

    
</body>
</html>