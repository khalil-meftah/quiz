<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
  
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Générer un questionnaire</title>

</head>
<body>
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main">
<!-- <x-main-nav :title="'quiz-generator'" :user-role="$userRole"/> -->
<div class="main-content create">
<div id="quiz-generator-div"></div>

  <h1 class="h1 mb-4">Générer un questionnaire</h1>
  <form action="{{ route('quiz-generator.generate') }}" method="POST">
      @csrf
      <div id="generate-quiz"></div>
      <select name="module" id="mod" required>
          <option value="">Sélectionner le Module</option>
          @foreach($modules as $module)
              <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
          @endforeach
      </select>

      <select name="chapitre" id="chap" disabled>
          <option value="">Sélectionner le chapitre</option>
      </select>

      <select name="type" id="type" onchange="toggleNControle()" required>
          <option value="">Sélectionner le type</option>
          <option value="Examen de fin de module">Examen de fin de module</option>
          <option value="Contrôle">Contrôle</option>
      </select>

      <div id="nControleFields">
      <input type="number" name="nControle" id="nControle" placeholder="N° du Contrôle">
      </div>

      <label for="titreDanne" class="label">Titre de L'année</label>
      <div class="double-input">
          <input type="number" name="titreDanne1" min="1974" max="2099" id="titreDanne" placeholder="Année 1" required>
          <input type="number" name="titreDanne2" min="1974" max="2099" id="titreDanne" placeholder="Année 2" required>
      </div>

      <input type="text" name="filiere" id="filiere" placeholder="Filière">

      <input type="text" name="numModule" id="numModule" placeholder="Numéro de module">
      
      <label for="dateEvaluation" class="label">Date d'évaluation</label>
      <input type="date" name="dateEvaluation" id="dateEvaluation" placeholder="Date d'évaluation" required>

    <select name="anneDeFormation" id="anneDeFormation" placeholder="Année de formation" required>
        <option value="">Sélectionner l'année de formation</option>
        <option value="1">1er année</option>
        <option value="2">2ème année</option>
      </select>

      <input type="number" name="duree" id="duree" step="1" placeholder="Durée d'évaluation" required>

      <input type="number" name="variante" id="variante" placeholder="Variante" required>

      <input type="number" name="bareme" id="bareme" placeholder="Barème" required>

      <button type="submit" class="standard-btn generate-btn">
        <img src="{{asset('logo\generateQuiz.svg')}}" alt="quiz" class="btn-icon">
        <span>Générer un questionnaire</span>
      </button>
  </form>

</div>
</main>

  <script>

  let modSelect = document.getElementById('mod');
  let chapSelect = document.getElementById('chap');
  let intituleModule = document.getElementById('intituleModule');


  modSelect.addEventListener('change', function() {
      let mod = this.value;
      if (mod) {
          let xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  document.getElementById("chap").disabled = false;
                  let chap = JSON.parse(xhr.responseText);
                  chapSelect.innerHTML = '<option value="">Sélectionner le chapitre</option>';
                  chap.forEach(function(chapitre) {
                      let option = document.createElement('option');
                      option.value = chapitre.id;
                      option.text = chapitre.nomChapitre;
                      chapSelect.add(option);
                  });
              }
          };
          xhr.open('GET', '/quiz-generator/' + mod + '/chapitres', true);
          xhr.send();
      } else {
          chapSelect.innerHTML = '<option value="">Sélectionner le chapitre</option>';
          chapSelect.disabled = true;
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

<x-links/>
</body>
</html>