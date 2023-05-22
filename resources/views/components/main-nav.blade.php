<div class="main-nav">
    @if($r->title == 'quiz-generator')

    @else
    <a href="{{ route($r->index) }}">Consulter</a>
    <a href="{{ route($r->create) }}">Ajouter</a>
        @if($r->title == 'question-reponse' )
        <a href="{{ route($r->confirm) }}">Confirmer</a>
        @endif
    @endif
</div>
