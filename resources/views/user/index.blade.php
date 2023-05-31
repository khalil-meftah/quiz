<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">

    <title>Profile</title>

</head>
<body>
    
<x-loader/>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
    <x-main-nav :title="'profile'" :user-role="$userRole" />
    <div class="main-content">
        <div id="profile-div"></div>
        @if(Auth::check())
        <div class="profile-container">
            <img src="{{asset('logo\profile.svg')}}" alt="profile" class="profile-img">
            <div class="profile-info">
                <p>Nom : <span>{{$user->name}}</span></p>
                <p>Prénom : <span>{{$user->prenom}}</span></p>
                <p>Email Address : <span>{{$user->email}}</span></p>
                <p>Role : <span>{{$user->role}}</span></p>
                <p>Date De Naissance : <span>{{$user->dateDeNaissance}}</span></p>
                <p>Téléphone : <span>{{$user->numeroDeTelephone}}</span></p>
                <p>Adresse : <span>{{$user->adresse}}</span></p>
            </div>
            <div class="profile-forms">
                <form action="{{route('profile.edit', $user->id)}}">
                    @csrf
                    @method('PUT')
                    <button class="standard-btn" type="submit"><img src="{{asset('logo/edit.svg')}}"/><span>Modifier</span></button>
                </form>
                <form action="{{route('user.destroy', $user->id)}}" method ="post">   
                    @csrf
                    @method('delete')
                    <button class="standard-btn" type="submit"><img src="{{asset('logo/delete.svg')}}"/><span>Supprimer</span></button>
                </form>
            </div>
        </div>
        @endif
        
            <style>
                .profile-container{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-around;
                    align-items: center;
                    width: 100%;
                    height: 100%;
                    margin-top: 3em;

                    background-color: white;
                    padding: 3em;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

                }
                .profile-img{
                    filter: var(--icon-main);
                    width: 100px;
                    height: 100px;
                }
                .profile-info{
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: .3em;
                    width: 100%;
                    height: 100%;
                    margin-top: 2em;
                }
                .profile-info p{
                    font-size: 1em;
                    font-weight: bold;
                }
                .profile-info p span{
                    font-size: 1em;
                    font-weight: normal;
                }

                .profile-forms{
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;

                    gap: 1em;
                    width: 100%;
                    height: 100%;
                    margin-top: 2em;
                    font-size: 1.1em;
                }
                .profile-forms form button{
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;

                    padding: .6em .9em;

                }
                .profile-forms form:nth-child(2):hover button{
                    background-color: var(--red);
                }
                .profile-forms form button img{
                    width: 1.7em;
                    height: 1.7em;
                    margin-right: 5px;
                }
            </style>

        </div>
        <!-- @if(Auth::check())
        <table class="main-table">
            <tr>
                <td>
                <p>Nom</p>
                <p>Prénom</p>
                <p>Email Address</p>
                <p>Role</p>
                <p>Date De Naissance</p>
                <p>Téléphone</p>
                <p>Adresse</p>
                <p>Mot De Passe</p>
                </td>
                <td>
                <p>{{$user->name}}</p>
                <p>{{$user->prenom}}</p>
                <p>{{$user->email}}</p>
                <p>{{$user->role}}</p>
                <p>{{$user->dateDeNaissance}}</p>
                <p>{{$user->numeroDeTelephone}}</p>
                <p>{{$user->adresse}}</p>
                <p>{{$user->password}}</p>
                </td>
                <td>
                    <form action="{{route('profile.edit', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <button type="submit">Modifier</button>
                    </form>
                    <form action="{{route('user.destroy', $user->id)}}" method ="post">   
                        @csrf
                        @method('delete')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            

        </table>
        @endif -->
    </div>
</main>

<x-links/>
</body>
</html>