<div class="main-nav">
    @if($r->title == 'quiz-generator')

    @else
    @isset($r->index)
    <a href="{{ route($r->index) }}">Consulter</a>
    @endisset
    @isset($r->create)
    <a href="{{ route($r->create) }}">Ajouter</a>
    @endisset
        @if($userRole != 'professeur')
        @isset($r->confirm)
        <a href="{{ route($r->confirm) }}">Confirmer</a>
        @endisset
        @endif
    @endif
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
