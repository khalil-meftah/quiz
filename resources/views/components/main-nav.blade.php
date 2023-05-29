<nav class="main-nav" id="main-nav">
    @if($r->title == 'quiz-generator')

    @else
    @isset($r->index)
    <a href="{{ route($r->index) }}">
        <img src="{{ asset('logo/consulter.svg') }}" alt="consulter">
        Consulter
    </a>
    @endisset
    @isset($r->create)
    @if($r->title != 'question-reponse' && $r->title != 'reponse' && $r->title != 'question')
    <a href="{{ route($r->create) }}">
        <img src="{{ asset('logo/ajouter.svg') }}" alt="ajouter">
        Ajouter
    </a>
    @endif
    @endisset
        @if($userRole != 'professeur')
        @isset($r->confirm)
        <a href="{{ route($r->confirm) }}">
            <img src="{{ asset('logo/confirmer.svg') }}" alt="confirmer">
            Confirmer
        </a>
        @endisset
        @endif
    @endif

</nav>
