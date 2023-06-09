<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pending.css') }}" >

    <link rel="icon" href="logo\quiz.svg" type="image/png" sizes="16x16">

    <title>Félicitation</title>
</head>
<body>
    <img src="/logo/logo.svg" alt="quiz" class="logo">
    <div class="anniv container">
    <img src="/logo/bday.svg" alt="Birthday Image" class="icon">
    <div class='msg'>
        <h1>Joyeux Anniversaire <strong>{{ auth()->user()->prenom }}</strong> !</h1>
    <div>
   <p>
        Cher <strong>{{ auth()->user()->prenom }}</strong> de Quiz,
    </p>
    <p>
        Nous te souhaitons un joyeux anniversaire ! Que cette journée soit spéciale et te comble de bonheur, de surprises et de souvenirs inoubliables. Nous espérons que cette nouvelle année sera une étape de plus vers la réalisation de tous tes rêves et aspirations.
    </p>
    <p>
        Nous voulions également profiter de cette occasion pour exprimer notre gratitude pour ta fidélité et ta contribution à notre communauté grandissante. Ta présence et tes retours nous sont extrêmement précieux, car ils nous aident à améliorer en permanence notre site.
    </p>
    <p>
        Cordialement,
    </p>
    <p>
        L'équipe de Quiz    
    </p>
    </div>
     

     <a href="{{ route('home') }}">
     <img src="/logo/home.svg" alt="home">
     <span>Retourner au tableau de bord</span>
    </a>

    </div>
</div>
</body>
</html>