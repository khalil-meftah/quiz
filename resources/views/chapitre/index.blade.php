<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Chapitre</title>

</head>
<body>
<x-loader/>
    @php
        $userRole = auth()->user()->role;
    @endphp
    <x-side-nav />
    <div id="fake"></div>
    <main class="main">
    <x-main-nav :title="'chapitre'" :user-role="$userRole"/>
    <div class="main-content">
    <div id="chapitre-div"></div>

    @isset( $chapitres )
    <div class="selection-section">
      <div class="selection-header">
        <h1>Chapitres</h1>
        <div>
        <button id="visibility-btn" class="visibility-btn standard-btn" value="on">
          <img src="{{asset('logo\show.svg')}}" alt="" id="show-eye"/>
          <img src="{{asset('logo\hide.svg')}}" alt="" id="hide-eye"/>
          <span id="visibility-btn-span">Afficher tous</span>
        </button>
        <a id="add-chapitre-btn" class="add-chapitre-btn standard-btn" href="{{ route('chapitre.create') }}">
          <img src="{{asset('logo\add.svg')}}" alt="" id="add"/> 
          <span id="add-chapitre-btn-span">Ajouter un chapitre</span>
        </a>
        </div>
      </div> 
      @foreach( $chapitres as $chapitre)
        <div id="parent" class="chapitre section">
          <div class="chapitre-content section-content">
            <img src="{{asset('logo/chapitre.svg')}}" alt="" class="chapitre-icon section-icon"/>
            <span>{{ $chapitre->nomChapitre }}</span>
            <img src="{{asset('logo/expand.svg')}}" alt="" class="down"/>
          </div>
          <div class="forms">
            <form action="{{route('chapitre.edit',$chapitre->id )}}" method="get" >
                @csrf
                <button class="btn-edit" type="submit"><img src="{{asset('logo/edit.svg')}}"/></button>
            </form>
            <form action="{{route('chapitre.destroy',$chapitre->id )}}" method="post" >
                @csrf    
                @method('delete')
                <button class="btn-delete" type="submit"><img src="{{asset('logo/delete.svg')}}"/></button>
            </form>
          </div>
      </div>
      <div id="child">
        <div class="chapitre-info section-info">
            <div>
                <p>Nom : </p>
                <p>Description : </p>
                <p>Nombres d'heures : </p>
                <p>Date de début : </p>
                <p>Date de création : </p>
                <p>Module : </p>
            </div>
            <div>
                <p>{{$chapitre->nomChapitre}}</p>
                <p>{{$chapitre->descriptionChapitre}}</p>
                <p>{{$chapitre->nombreHeuresChapitre}}</p>
                <p>{{$chapitre->dateDebutChapitre}}</p>
                <p>{{$chapitre->dateCreationChapitre}}</p>
                <p>{{$chapitre->module->nomModule}}</p> 
            </div>

        </div>
      </div>
        @endforeach
    </div>
    @endisset
    </div>
        <div class="pagination-links">{{ $chapitres->onEachSide(1)->links() }}</div>

    </div>
    </main>
    <x-links/>
</body>
</html>