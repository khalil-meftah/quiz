<div class="sidenav">
  <a href="{{route('question-reponse.index')}}">Question</a>
  @if(Auth::user()->role == 'mainteneur' || Auth::user()->role == 'administrateur')
  <a href="{{route('chapitre.index')}}">Chapitre</a>
  <a href="{{route('module.index')}}">Module</a>
  @endif
  @if(Auth::user()->role == 'administrateur')
  <a href="{{route('user.index')}}">Users</a>
  @endif
  <a href="{{route('quiz-generator')}}">Generate Quiz</a>
</div>