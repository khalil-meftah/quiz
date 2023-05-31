<aside class="sidenav" id="sidenav">
  <img src="{{asset('logo/logoW.svg')}}" alt="logo" class="logo" id="logo1">
  <img src="{{asset('logo/quizW.svg')}}" alt="logo" class="logo logo2" id="logo2">
  <div class="sidenav-menu">
    <ul>
      <li id="section-question-reponse">
        <a href="{{route('question-reponse.index')}}">
          <img src="{{asset('logo/question.svg')}}" alt="logo" class="sidenav-icon">
          <span>Questions</span>
        </a>
      </li>

      @if(Auth::user()->role == 'mainteneur' || Auth::user()->role == 'administrateur')
      <li id="section-chapitre">
        <a href="{{route('chapitre.index')}}">
          <img src="{{asset('logo/chapitres.svg')}}" alt="logo" class="sidenav-icon">
          <span>Chapitres</span>
        </a>
        </li>
      <li id="section-module">
        <a href="{{route('module.index')}}">
          <img src="{{asset('logo/module.svg')}}" alt="logo" class="sidenav-icon">
        <span>Modules</span>
        </a>
      </li>
      @endif

      @if(Auth::user()->role == 'administrateur')
      <li id="section-user">
        <a href="{{route('user.index')}}">
          <img src="{{asset('logo/users.svg')}}" alt="logo" class="sidenav-icon">
          <span>Utilisateurs</span>
        </a>
      </li>
      @endif

      <li id="section-quiz-generator">
        <a href="{{route('quiz-generator')}}">
          <img src="{{asset('logo/generateQuiz.svg')}}" alt="logo" class="sidenav-icon">
          <span>Générer un questionnaire</span>
        </a>
      </li>

      <li class="profile" id="section-profile">
        <a href="{{route('profile.index')}}">
          <img src="{{asset('logo/profile.svg')}}" alt="logo" class="sidenav-icon"><span>Profile</span>
        </a>
      </li>
      <li class="logout">
        <a href="{{route('logout')}}">
          <img src="{{asset('logo/logout.svg')}}" alt="logo" class="sidenav-icon"><span>Se déconnecter</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="burger-btn" id="burger-btn">
    <span></span>
    <span></span>
  </div>
  
</aside>