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
</head>
<body>
<x-side-nav />
<x-main-nav :title="'quiz-generator'" />


<div class="main-content">

<form action="/quiz-generator/generate" method="POST">
    @csrf

    <label for="module">Select a Module:</label>
    <select name="module" id="module">
        <option value="">--Select a Module--</option>
        @foreach($modules as $module)
            <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
        @endforeach
    </select>
    <br>
    <label for="chapitre">Select a chapitre:</label>
    <select name="chapitre" id="chapitre" disabled>
        <option value="">--Select a chapitre--</option>
    </select>

    <br>
    <button type="submit" target="_blank">Generate Quiz</button>
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

  </script>


</body>
</html>