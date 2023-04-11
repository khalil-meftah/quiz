{{-------------showing the chapitres-----------------------}}
@foreach ($mod as $n)
    {{$n->descriptionModule}}
    <br>
    {{$n->nombreHeuresModule}}
    <br>
    {{$n->dateDebutModule}}
    <br>
    {{$n->dateCreationModule}}
    <hr>
@endforeach
