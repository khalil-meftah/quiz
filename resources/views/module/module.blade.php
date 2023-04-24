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
      {{-- ---------------------------REVENIR A LA PAGE DE CREATION---------------------------}}
      <a href="{{route('module.create')}}">Ajoutez module</a>
    <table>
    <tr>
        <td>nom du module</td>
        <td>description du module</td>
        <td>nombre d'heures du module</td>
        <td>date de début du module </td>
        <td>date de céation du module</td>
    </tr>
<tr>
    
     {{-------------showing the modules-----------------------}}
@foreach ($mod as $mod)
    <td> {{$mod->nomModule}}</td>

   <td> {{$mod->descriptionModule}}</td>

   <td> {{$mod->nombreHeuresModule}}</td>

   <td> {{$mod->dateDebutModule}}</td>

   <td> {{$mod->dateCreationModule}}</td>
   <td> <form action="{{route("module.edit", $mod->id)}}">
    @csrf
    @method('PUT')
    <button type="submit">modifier</button>
    </form>

    <td>
    <form action="{{route("module.destroy", $mod->id)}}" method ="post">   
            @csrf
            @method('delete')
    <button type="submit">supprimer</button>
</form>
</td>
    
 </tr> 
@endforeach

    </table>
</body>
</html>