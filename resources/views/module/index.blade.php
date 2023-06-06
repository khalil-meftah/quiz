
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Modules</title>
    
</head>
<body>
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'module'" :user-role="$userRole" />
  <div class="main-content">
  <div id="module-div"></div>

  @isset( $modules )
    <div class="selection-section">
      <div class="selection-header">
        <h1>Modules</h1>
        <div>
        <button id="visibility-btn" class="visibility-btn standard-btn" value="on">
          <img src="{{asset('logo\show.svg')}}" alt="" id="show-eye"/>
          <img src="{{asset('logo\hide.svg')}}" alt="" id="hide-eye"/>
          <span id="visibility-btn-span">Afficher tous</span>
        </button>
        <a id="add-module-btn" class="add-module-btn standard-btn" href="{{ route('module.create') }}">
          <img src="{{asset('logo\add.svg')}}" alt="" id="add"/> 
          <span id="add-module-btn-span">Ajouter un module</span>
        </a>
        </div>
      </div> 
      @foreach( $modules as $module)
        <div id="parent" class="module section">
          <div class="module-content section-content">
            <img src="{{asset('logo/module.svg')}}" alt="" class="module-icon section-icon"/>
            <span>{{ $module->nomModule }}</span>
            <img src="{{asset('logo/expand.svg')}}" alt="" class="down"/>
          </div>
          <div class="forms">
            <form action="{{route('module.edit',$module->id )}}" method="get" >
                @csrf
                <button class="btn-edit" type="submit"><img src="{{asset('logo/edit.svg')}}"/></button>
            </form>
            <form action="{{route('module.destroy',$module->id )}}" method="post" >
                @csrf    
                @method('delete')
                <button class="btn-delete" type="submit"><img src="{{asset('logo/delete.svg')}}"/></button>
            </form>
          </div>
      </div>
      <div class="child" id="child">
        <table class="main-table">
            <tr>
                <td>Nom</td>
                <td>{{$module->nomModule}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$module->descriptionModule}}</td>
            </tr>
            <tr>
                <td>Nombres d'heures</td>
                <td>{{$module->nombreHeuresModule}}</td>
            </tr>
            <tr>
                <td>Date de début</td>
                <td>{{$module->dateDebutModule}}</td>
            </tr>
        </table>
      </div>

        @endforeach
    </div>
    @endisset
  
    <div class="pagination-links">{{ $modules->onEachSide(1)->links() }}</div>

  </div>
</main>

<x-links/>
</body>
</html>