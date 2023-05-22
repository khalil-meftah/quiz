<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>  
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pending.css') }}" >

  

</head>
<body>
   
    <img src="/logo/hourglass.png" alt="hourglass" >
    <div id='msg'>
   Salut {{ auth()->user()->prenom }} 
   Nous tenons à vous informer que votre compte est actuellement inactif. Veuillez noter que votre compte doit être activé avant de pouvoir accéder à toutes les fonctionnalités de notre plateforme.

Nous comprenons que cela puisse être frustrant, mais veuillez patienter pendant que nous examinons et activons votre compte.



Nous vous remercions de votre compréhension et de votre patience.

Cordialement,
L'équipe de support
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
    </div>
</body>
</html> 
