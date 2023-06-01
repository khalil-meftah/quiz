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
          <span id="add-user-btn-span">Ajouter un utilisateur</span>
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
        <div class="child" id="child">
          <table class="main-table">
              <tr>
                  <td>Nom</td>
                  <td>{{$user->name}}</td>
              </tr>
              <tr>
                  <td>Prénom</td>
                  <td>{{$user->prenom}}</td>
              </tr>
              <tr>
                  <td>Email Address</td>
                  <td>{{$user->email}}</td>
              </tr>
              <tr>
                  <td>Role</td>
                  <td>{{$user->role}}</td>
              </tr>
              <tr>
                  <td>Date De Naissance</td>
                  <td>{{$user->dateDeNaissance}}</td>
              </tr>
              <tr>
                  <td>Téléphone</td>
                  <td>{{$user->numeroDeTelephone}}</td>
              </tr>
              <tr>
                  <td>Addresse</td>
                  <td>{{$user->adresse}}</td>
              </tr>
              <tr>
                  <td>status</td>
                  <td>
                      @if($user->status == 1)
                          actif
                      @elseif($user->status == 0)
                          inactif
                      @endif
                  </td>
              </tr>
          </table>
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
