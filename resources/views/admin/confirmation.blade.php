<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >

    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>utilisateurs</title>

</head>
<body>
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'user'" :user-role="$userRole"/>

<div class="main-content">
<div id="user-div"></div>
  
    @isset( $users )
    <div class="selection-section">
      <div class="selection-header">
        <h1>Utilisateurs</h1>
        <div>
        <button id="visibility-btn" class="visibility-btn standard-btn" value="on">
          <img src="{{asset('logo\show.svg')}}" alt="" id="show-eye"/>
          <img src="{{asset('logo\hide.svg')}}" alt="" id="hide-eye"/>
          <span id="visibility-btn-span">Afficher tous</span>
        </button>
        <a id="add-user-btn" class="add-user-btn standard-btn" href="{{ route('user.create') }}">
          <img src="{{asset('logo\add.svg')}}" alt="" id="add"/> 
          <span id="add-user-btn-span">Ajouter un user</span>
        </a>
        </div>
      </div> 
      @foreach( $users as $user)
        <div id="parent" class="user section">
          <div class="user-content section-content">
            <img src="{{asset('logo/user.svg')}}" alt="" class="user-icon section-icon"/>
            <span>{{ $user->name }}</span>
            <img src="{{asset('logo/expand.svg')}}" alt="" class="down"/>
          </div>
          <div class="forms">

          @if($user->status == 0)
            <form action="{{route('user.validate', $user->id)}}" method="post">
                @csrf    
                @method('patch')
                <button type="submit" class="validation-btn standard-btn">
                  <img src="{{asset('logo/validerGreen.svg')}}"/>
                  <span>Valider</span>
                </button>
            </form>
            @endif

            <form action="{{route('user.edit',$user->id )}}" method="get" >
                @csrf
                <button class="btn-edit" type="submit"><img src="{{asset('logo/edit.svg')}}"/></button>
            </form>
            <form action="{{route('user.destroy',$user->id )}}" method="post" >
                @csrf    
                @method('delete')
                <button class="btn-delete" type="submit"><img src="{{asset('logo/delete.svg')}}"/></button>
            </form>
          </div>
      </div>
      <div id="child">
        <div class="user-info section-info">
            <div>
                <p>Nom</p>
                <p>Prénom</p>
                <p>Email Address</p>
                <p>Role</p>
                <p>Date De Naissance</p>
                <p>Téléphone</p>
                <p>Addresse</p>
                <p>status</p>
            </div>
            <div>
                <p>{{ $user->name }}</p>
                <p>{{ $user->prenom }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->role }}</p>
                <p>{{ $user->dateDeNaissance }}</p>
                <p>{{ $user->numeroDeTelephone }}</p>
                <p>{{ $user->adresse }}</p>
                @if($user->status == 1)
                <p>actif</p>
                @elseif($user->status == 0)
                <p>inactif</p>
                @endif
            </div>

        </div>
      </div>
        @endforeach
    </div>
    @endisset
</div>

<!-- add pagination links -->
  <div class="pagination-links">{{ $users->onEachSide(1)->links() }}</div>

</main>
<x-links/>
</body>
</html>
