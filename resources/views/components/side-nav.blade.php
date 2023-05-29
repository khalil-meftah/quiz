<aside class="sidenav" id="sidenav">
  <img src="{{asset('logo/logoW.svg')}}" alt="logo" class="logo" id="logo1">
  <img src="{{asset('logo/quizW.svg')}}" alt="logo" class="logo logo2" id="logo2">
  <div class="sidenav-menu">
    <ul>
      <li>
        <a href="{{route('question-reponse.index')}}">
          <img src="{{asset('logo/question.svg')}}" alt="logo" class="sidenav-icon">
          <span>Question</span>
        </a>
      </li>

      @if(Auth::user()->role == 'mainteneur' || Auth::user()->role == 'administrateur')
      <li>
        <a href="{{route('chapitre.index')}}">
          <img src="{{asset('logo/chapter.svg')}}" alt="logo" class="sidenav-icon">
          <span>Chapitre</span>
        </a>
        </li>
      <li>
        <a href="{{route('module.index')}}">
          <img src="{{asset('logo/module.svg')}}" alt="logo" class="sidenav-icon">
        <span>Module</span>
        </a>
      </li>
      @endif

      @if(Auth::user()->role == 'administrateur')
      <li>
        <a href="{{route('user.index')}}">
          <img src="{{asset('logo/users.svg')}}" alt="logo" class="sidenav-icon">
          <span>Users</span>
        </a>
      </li>
      @endif

      <li>
        <a href="{{route('quiz-generator')}}">
          <img src="{{asset('logo/generateQuiz.svg')}}" alt="logo" class="sidenav-icon">
          <span>Generate Quiz</span>
        </a>
      </li>

      <li class="logout">
        <a href="{{route('logout')}}"><img src="{{asset('logo/logout.svg')}}" alt="logo" class="sidenav-icon"><span>Logout</span></a>
      </li>
    </ul>
  </div>

  <div class="burger-btn" id="burger-btn">
    <span></span>
    <span></span>
  </div>





  <script src="{{ asset('js/dashboard.js') }}"></script>

</aside>