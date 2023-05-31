<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pending.css') }}" >

    <link rel="icon" href="logo\quiz.svg" type="image/png" sizes="16x16">

  

</head>
<body>

    <img src="/logo/logo.svg" alt="quiz" class="logo">
    <div class="container">
        <img src="/logo/hourglass.png" alt="hourglass" class="icon">
        <div class='msg'>
            <h1>En attente d'activation</h1>
            <div>
                <p>Bonjour <span>{{ auth()->user()->prenom }}</span>,</p>
                <p>
                    Nous tenons à vous informer que votre compte est actuellement inactif. Veuillez noter que votre compte doit être activé avant de pouvoir accéder à toutes les fonctionnalités de notre plateforme.
                </p>
                <p>
                    Nous comprenons que cela puisse être frustrant, mais veuillez patienter pendant que nous examinons et activons votre compte.Nous vous remercions de votre compréhension et de votre patience.
                </p>
                <p>Cordialement,</p>
                <p>L'équipe de support</p>
            </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button  class="logout" type="submit">
                <img src="/logo/logout.svg" alt="logout">
                <span>Logout</span>
            </button>
        </form>
        </div>
    </div>

    
</body>
</html> 
