<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page de modification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        form{
        
           width:500px;
            padding:20px;
            box-sizing:border-box;  
            margin-left: 35%;
            margin-top: 15%;
            
            border: 2px blueviolet solid;
           
            }
            label,input{
                margin-bottom:10px ;
            }
        label{
            padding-right:5px;
        }
        input{
            padding-left:2px;
        }
        body{
            
        }
    </style>
    
</head>
<body>
    {{-- ---------------------------REVENIR A LA PAGE MODULE---------------------------}}
  <a href="{{route("module.index")}}">retourner au tableau de bord</a>
{{-- la page de creation de formulaire d'insertion --}}
<form  method="POST" action="{{route('module.update',$mod ->id)}}">
    @csrf
    @method('patch')
    {{-- ----------------------NOM DU Module-------------------------- --}}
<label for="nomModule">nom du Module</label>
<input type="text" name="nomModule" id="nomModule" value="{{$mod->nomModule}}"> <br>
{{------------- DESCRIPTION Module ---------------------}}
    <label for="descriptionModule">description Module</label>
        <input type="text" name="descriptionModule"  value ="{{$mod ->descriptionModule}}" id="descriptionModule"><br>
{{-- --------NOMBRE HEURES Module -----------------------}}
    <label for="nbh">nombre Heures Module</label>
        <input type="integer" name="nombreHeuresModule"  value ="{{$mod ->nombreHeuresModule}}" id="nombreHeuresModule"><br>
{{-- -------------DATE CREATION Module--------------- --}}
    <label for="dateCreationModule">date Creation Module</label>
    <input type="date" name="dateCreationModule"  value ="{{$mod ->dateCreationModule}}" id="dateCreationModule"><br>
{{------------ DATE DEBUT Module-----------------------}}
    <label for="dateDebutModule">date Debut Module</label>
        <input type="date" name="dateDebutModule" value ="{{$mod ->dateDebutModule}}" id="dateDebutModule"><br>

{{-- ------------------SUBMIT--------------------------- --}}
    <button type="submit">enregistrer modifications</button>
{{-- ---------------------RESET------------------------- --}}
    <button type="reset">annuler</button>
    </form>
      
</div>
{{-- -------------------------VALIDATION------------------------ --}}
@if ($errors->any() )
<div >
    @foreach(
        $errors->all() as $error
        )
        <li>
            {{$error}}
        </li>
    @endforeach

    
@endif
  
</body>
</html>