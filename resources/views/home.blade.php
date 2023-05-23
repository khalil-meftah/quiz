<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reponse.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/question-reponse.css') }}" >

    <title>home</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
@php
    $userRole = auth()->user()->role;
@endphp
<x-side-nav />
<x-main-nav :title="'home'" :user-role="$userRole" />

<div class="main-content">

</div>


</body>
</html>