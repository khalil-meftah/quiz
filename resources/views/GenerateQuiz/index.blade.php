<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Dashboard</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<x-main-nav :title="'quiz-generator'" :user-role="$userRole"/>


<div class="main-content">

<form action="/quiz-generator/generate" method="POST">
    @csrf

    <label for="module">Sélectionner le Module : </label>
    <select name="module" id="module">
        <option value="">--Sélectionner le Module--</option>
        @foreach($modules as $module)
            <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
        @endforeach
    </select>
    <br>
    <label for="chapitre">Sélectionner le chapitre : </label>
    <select name="chapitre" id="chapitre" disabled>
        <option value="">--Sélectionner le chapitre--</option>
    </select>
    <br>
    <label for="type">Type : </label>
    <select name="type" id="type" onchange="toggleNControle()">
        <option value="">--Sélectionner le type--</option>
        <option value="Examen de fin de module">Examen de fin de module</option>
        <option value="Contrôle">Contrôle</option>
    </select>
    <br>
    <div id="nControleFields">
    <label for="nControle">N° du Contrôle : </label>
    <input type="number" name="nControle" id="nControle">
    </div>
    <label for="titreDanne">Titre de L'année : </label>
    <input type="number" name="titreDanne1" min="1900" max="2099" id="titreDanne">
    <input type="number" name="titreDanne2" min="1900" max="2099" id="titreDanne">
    <br>
    <label for="filiere">Filière : </label>
    <input type="text" name="filiere" id="filiere">
    <br>
    <label for="niveau">Niveau</label>
    <select name="niveau" id="niveau">
      <option value="">--Sélectionner le niveau--</option>
      <option value="TS">TS</option>
      <option value="T">T</option>
      <option value="Q">Q</option>
      <option value="S">S</option>
    </select>
    <br>
    <label for="numModule">Numéro de module : </label>
    <input type="text" name="numModule" id="numModule">
    <br>
    <label for="intituleModule">Intitulé du module : </label>
    <input type="text" name="intituleModule" id="intituleModule">
    <br>
    <label for="dateEvaluation">Date d'évaluation : </label>
    <input type="date" name="dateEvaluation" id="dateEvaluation">
    <br>
    <label for="anneDeFormation">Année de formation : </label>
    <input type="number" name="anneDeFormation" id="anneDeFormation">
    <br>
    <!-- <label for="epreuve">epreuve</label>
    <input type="text" name="epreuve" id="epreuve">
    <br> -->
    <label for="duree">Durée : </label>
    <input type="number" name="duree" id="duree" step="1">
    <br>
    <label for="variante">Variante : </label>
    <input type="number" name="variante" id="variante">
    <br>
    <label for="bareme">Bareme : </label>
    <input type="number" name="bareme" id="bareme">
    <br>
    <button type="submit">Générer un questionnaire</button>
</form>

@isset( $questions )
<div class="selection-section">
  @foreach( $questions as $question)
    <h3> Quzstion: {{ $question->descriptionQuestion }}</h3>
      <table class="main-table">
        <tr>
          <th>descriptionReponse</th>
          <th>valeurReponse</th>
        </tr>
        @foreach( $question->reponses as $reponse )
          <tr>
            <td>{{ $reponse['descriptionReponse'] }}</td>
            @if($reponse['valeurReponse'] == "1")
            <td class="green">Vrai</td>
            @elseif($reponse['valeurReponse'] == "0")
            <td class="red">Faux</td>
            @endif
          </tr>
        @endforeach
      </table>
    @endforeach
</div>
@endisset

  </div>




  <script>
  var moduleSelect = document.getElementById('module');
  var chapitreSelect = document.getElementById('chapitre');

  moduleSelect.addEventListener('change', function() {
      let module = this.value;
      if (module) {
          let xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  document.getElementById("chapitre").disabled = false;
                  let chapitres = JSON.parse(xhr.responseText);
                  chapitreSelect.innerHTML = '<option value="">--Select a chapitre--</option>';
                  chapitres.forEach(function(chapitre) {
                      let option = document.createElement('option');
                      option.value = chapitre.id;
                      option.text = chapitre.nomChapitre;
                      chapitreSelect.add(option);
                  });
              }
          };
          xhr.open('GET', '/quiz-generator/' + module + '/chapitres', true);
          xhr.send();
      } else {
          chapitreSelect.innerHTML = '';
      }
  });

  let nControleFields = document.getElementById("nControleFields");
  nControleFields.style.display = "none";
  function toggleNControle() {
    let typeSelect = document.getElementById("type");

    if (typeSelect.value === "Contrôle") {
        nControleFields.style.display = "block";
    } else {
        nControleFields.style.display = "none";
    }
}
  </script>


</body>
</html>