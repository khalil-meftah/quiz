{{-------------showing the chapitres-----------------------}}
@foreach ($chap as $n)
    {{$n->descriptionChapitre}}
    <br>
    {{$n->nombreHeuresChapitre}}
    <br>
    {{$n->dateDebutChapitre}}
    <br>
    {{$n->dateCreationChapitre}}
    <hr>
@endforeach
