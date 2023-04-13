{{-- la page de creation de formulaire d'insertion --}}
<form  method="POST" action="{{route('chapitre.store')}}">
    @csrf
{{------------- DESCRIPTION CHAPITRE ---------------------}}
    <label for="descriptionChapitre">description Chapitre</label>
        <input type="text" name="descriptionChapitre" id="descriptionChapitre"><br>
{{-- --------NOMBRE HEURES CHAPITRE -----------------------}}
    <label for="nbh">nombre Heures Chapitre</label>
        <input type="integer" name="nombreHeuresChapitre" id="nombreHeuresChapitre"><br>
{{-- -------------DATE CREATION CHAPITRE--------------- --}}
    <label for="dateCreationChapitre">date Creation Chapitre</label>
    <input type="date" name="dateCreationChapitre" id="dateCreationChapitre"><br>
{{------------ DATE DEBUT CHAPITRE -----------------------}}
    <label for="dateDebutChapitre">date Debut Chapitre</label>
        <input type="date" name="dateDebutChapitre"id="dateDebutChapitre"><br>

{{-- ------------------SUBMIT--------------------------- --}}
    <button type="submit">envoyer</button>
{{-- ---------------------RESET------------------------- --}}
    <button type="reset">annuler</button>
</form>
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
</div>
    
@endif
