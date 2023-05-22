<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>QuestionReponse</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
<x-side-nav />
<x-main-nav :title="'question-reponse'" />
<div class="main-content">
@isset( $modules , $chapitres )
<form action="{{route('question-reponse.searchByChapForConfirmation')}}" method="POST" class="search-form">
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
    <input type="hidden" name="pageName" value="confirmation">


    <button type="submit">Search</button>
</form>
@endisset

@isset( $questions )
<div class="selection-section">
    <button id="displayAll">Display all</button>
  @foreach( $questions as $question)
    <div id="question" class="question">
      <span> Question: {{ $question->descriptionQuestion }}</span>
      <svg fill="#000000" height="10px" width="10px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path></g></svg>
      
      <form action="{{route('question.edit',$question->id )}}" method="get">
          @csrf
          <button type="submit">Edit</button>
      </form>
      @if($question->status == "pending")
      <form action="{{route('questions.validate',$question->id )}}" method="post">
          @csrf    
          @method('patch')
          <input type="hidden" name="question_id" value="{{ $question->id }}">
          <button type="submit">Validate</button>
      </form>
      @endif
      <form action="{{route('question.destroy',$question->id )}}" method="post">
          @csrf    
          @method('delete')
          <button type="submit">Delete</button>
      </form>
      <!-- create form to call the function validateQuestion -->
      
  </div>
    
      <table class="main-table" id="reponse">
        <!-- <tr>
          <th>descriptionReponse</th>
          <th>valeurReponse</th>
        </tr> -->
        @foreach( $question->reponses as $reponse )
          <tr>
            <td>{{ $reponse['descriptionReponse'] }}</td>
            @if($reponse['valeurReponse'] == "1")
            <td class="green">Vrai</td>
            @elseif($reponse['valeurReponse'] == "0")
            <td class="red">Faux</td>
            @endif
            <td>
              <form action="{{route('reponse.edit',$reponse['id'] )}}" method="get">
                @csrf
                  <input type="hidden" name="question_id" value="{{ $question->id }}">
                  <button type="submit">Edit</button>
              </form>
            </td>
            <td>
              <form action="{{route('reponse.validate',$reponse['id'] )}}" method="post">
              @csrf    
              @method('patch')
                  <input type="hidden" name="reponse_id" value="{{ $reponse['id'] }}">
                  <button type="submit">Validate</button>
              </form>
            </td>
            <td>
              <form action="{{route('reponse.destroy',$reponse['id'] )}}" method="post">
              @csrf    
              @method('delete')
                  <button type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        <tr>
            <td>
                <form action="{{ route('reponse.create') }}" method="get">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <input type="submit" value="+ Reponse">
                </form>
            </td>
        </tr>
      </table>

    @endforeach
</div>
@endisset

<div class="pagination-links">{{ $questions->onEachSide(1)->links() }}</div>
</div>

<script>

let moduleSelect = document.getElementById('module');
let chapitreSelect = document.getElementById('chapitre');

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
        xhr.open('GET', '/question-reponse/' + module + '/chapitres', true);
        xhr.send();
    } else {
        chapitreSelect.innerHTML = '';
    }
});

let displayAll = document.querySelector('#displayAll');
let reponses = document.querySelectorAll('#reponse');
let questions = document.querySelectorAll('#question');

for (let i = 0; i < reponses.length; i++) {
  reponses[i].style.display = "none";
}
for (let i = 0; i < questions.length; i++) {
  questions[i].addEventListener('click', function() {
  if (reponses[i].style.display === "none") {
    reponses[i].style.display = "block";
  } else {
    reponses[i].style.display = "none";
  }
});
}


displayAll.addEventListener('click', function() {
  if (displayAll.textContent === "Display all") {
    for (let i = 0; i < reponses.length; i++) {
      reponses[i].style.display = "block";
    }
    displayAll.textContent = "Hide all";
  } else if (displayAll.textContent === "Hide all"){
    for (let i = 0; i < reponses.length; i++) {
      reponses[i].style.display = "none";
    }
    displayAll.textContent = "Display all";
  }
}); 


</script>
</body>
</html>