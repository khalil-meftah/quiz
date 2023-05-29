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
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <title>Question</title>
    <!-- @viteReactRefresh
    @vite('resources/js/app.js') -->
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main">
  <x-main-nav :title="'question-reponse'" :user-role="$userRole"/>
  <div class="main-content">
    @isset( $modules , $chapitres )
    <form action="{{route('question-reponse.searchByChap')}}" method="POST" class="search-form">
        @csrf

        <select name="module" id="module">
            <option value="">Sélectionnez le module</option>
            @foreach($modules as $module)
                <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
            @endforeach
        </select>
      
        <select name="chapitre" id="chapitre" disabled>
            <option value="">Sélectionnez le chapitre</option>
        </select>

        <select name="approval_status" id="approval_status">
            <option value="all">Tous</option>
            <option value="validated">Approuvé</option>
            <option value="pending">En attente</option>
        </select>

        <input type="hidden" name="page-name" value="index">
        <button type="submit" class="search-btn">
          <img src="{{asset('logo\search.svg')}}" alt="" />
          <span>Filtrer</span>
        </button>
    </form>
    @endisset

    @isset( $questions )
    <div class="selection-section">
      <div class="selection-header">
        <h1>Questions</h1>
        <div>
        <button id="visibility-btn" class="visibility-btn" value="on">
          <img src="{{asset('logo\show.svg')}}" alt="" id="show-eye"/>
          <img src="{{asset('logo\hide.svg')}}" alt="" id="hide-eye"/>
          <span id="visibility-btn-span">Afficher tous</span>
        </button>
        <a id="add-question-btn" class="add-question-btn" href="{{ route('question.create') }}">
          <img src="{{asset('logo\add.svg')}}" alt="" id="add"/> 
          <span id="add-question-btn-span">Ajouter une question</span>
        </a>
        </div>
      </div> 
      @foreach( $questions as $question)
        <div id="question" class="question">
          <div class="question-content">
            <img src="{{asset('logo/question2.svg')}}" alt="" class="question-icon"/>
            <span>{{ $question->descriptionQuestion }}</span>
            <img src="{{asset('logo/expand.svg')}}" alt="" class="down"/>
          </div>
          <div class="forms">
            <form action="{{route('question.edit',$question->id )}}" method="get" >
                @csrf
                <button class="btn-edit" type="submit"><img src="{{asset('logo/edit.svg')}}"/></button>
            </form>
            <form action="{{route('question.destroy',$question->id )}}" method="post" >
                @csrf    
                @method('delete')
                <button class="btn-delete" type="submit"><img src="{{asset('logo/delete.svg')}}"/></button>
            </form>
          </div>
      </div>
        
          <table class="main-table reponse" id="reponse">
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
                      <button class="btn-edit" type="submit"><img src="{{asset('logo/edit.svg')}}"/></button>
                  </form>
                </td>
                <td>
                  <form action="{{route('reponse.destroy',$reponse['id'] )}}" method="post">
                  @csrf    
                  @method('delete')
                      <button class="btn-delete" type="submit"><img src="{{asset('logo/delete.svg')}}"/></button>
                  </form>
                </td>
              </tr>
            @endforeach
            <tr>
                <td>
                    <form action="{{ route('reponse.create') }}" method="get">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <button class="add-reponse-btn" type="submit">
                          <img src="{{asset('logo/add.svg')}}"/>
                          <span>Ajouter une réponse</span>
                        </button>
                    </form>
                </td>
            </tr>
          </table>

        @endforeach
    </div>
    @endisset

    <div class="pagination-links">{{ $questions->onEachSide(1)->links() }}</div>
  </div>
</main>

</body>
</html>