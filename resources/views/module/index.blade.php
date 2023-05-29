
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="icon" href="{{asset('logo\quiz.svg')}}" type="image/png" sizes="16x16">



    <title>Modules</title>
    <!-- @viteReactRefresh
    @vite('resources/js/app.js') -->
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<div id="fake"></div>
<main class="main"> 
<x-main-nav :title="'module'" :user-role="$userRole" />
 
  <div class="main-content">

  <table class="main-table">

    <tr>
        <th>nom du module</th>
        <th>description du module</th>
        <th>nombre d'heures du module</th>
        <th>date de début du module </th>
        <th>date de céation du module</th>
    </tr>

    @foreach ($modules as $module)
    <tr>
        <td> {{$module->nomModule}}</td>
        <td> {{$module->descriptionModule}}</td>
        <td> {{$module->nombreHeuresModule}}</td>
        <td> {{$module->dateDebutModule}}</td>
        <td> {{$module->dateCreationModule}}</td>
        <td> 
            <form action="{{route('module.edit', $module->id)}}">
                @csrf
                @method('PUT')
                <button type="submit">modifier</button>
            </form>
        </td>

        <td>
            <form action="{{route('module.destroy', $module->id)}}" method ="post">   
                @csrf
                @method('delete')
                <button type="submit">supprimer</button>
            </form>
        </td>  
    </tr> 
    @endforeach
    </table>

    <div class="pagination-links">{{ $modules->onEachSide(1)->links() }}</div>

  </div>
</main>


</body>
</html>