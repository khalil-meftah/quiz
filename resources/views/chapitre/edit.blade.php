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

    </style>
    
</head>
<body>
{{-- ---------------------------REVENIR A LA PAGE CHAPITRE---------------------------}}

<a href="{{route('chapitre.index')}}">retourner au tableau de bord</a>
  
{{-- la page de creation de formulaire d'insertion --}}
<form  method="POST" action="{{route('chapitre.update',$chap->id)}}">
    @csrf
    @method('patch')
    {{-- ----------------------NOM DU CHAPITRE-------------------------- --}}
<label for="nomChapitre">nom du Chapitre</label>
<input type="text" name="nomChapitre" id="nomChapitre" value='{{$chap->nomChapitre}}'><br>
{{------------- DESCRIPTION CHAPITRE ---------------------}}
    <label for="descriptionChapitre">description Chapitre</label>
        <input type="text" name="descriptionChapitre"  value ="{{$chap->descriptionChapitre}}" id="descriptionChapitre"><br>
{{-- --------NOMBRE HEURES CHAPITRE -----------------------}}
    <label for="nbh">nombre Heures Chapitre</label>
        <input type="integer" name="nombreHeuresChapitre"  value ="{{$chap->nombreHeuresChapitre}}" id="nombreHeuresChapitre"><br>
{{-- -------------DATE CREATION CHAPITRE--------------- --}}
    <label for="dateCreationChapitre">date Creation Chapitre</label>
    <input type="date" name="dateCreationChapitre"  value ="{{$chap->dateCreationChapitre}}" id="dateCreationChapitre"><br>
{{------------ DATE DEBUT CHAPITRE -----------------------}}
    <label for="dateDebutChapitre">date Debut Chapitre</label>
        <input type="date" name="dateDebutChapitre" value ="{{$chap->dateDebutChapitre}}" id="dateDebutChapitre"><br>

{{-- ------------------SUBMIT--------------------------- --}}
    <button type="submit">enregistrer modifications</button>
{{-- ---------------------RESET------------------------- --}}
    <button type="reset">annuler</button>
    </form>
       {{-- --------------------------REVENIR A LA PAGE CHAPITRE----------------------------- --}}
{{-- <a href="{{}}">revenir au tableau  de chapitres</a> --}}
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