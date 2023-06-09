
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>félicitation</title>
</head>
<body>
    <div class="anniv">
   <span>
        Cher {{ auth()->user()->prenom }} de Quiz,
    </span>
    Nous te souhaitons un joyeux anniversaire ! Que cette journée soit spéciale et te comble de bonheur, de surprises et de souvenirs inoubliables. Nous espérons que cette nouvelle année sera une étape de plus vers la réalisation de tous tes rêves et aspirations.
    Nous voulions également profiter de cette occasion pour exprimer notre gratitude pour ta fidélité et ta contribution à notre communauté grandissante. Ta présence et tes retours nous sont extrêmement précieux, car ils nous aident à améliorer en permanence notre site.
    Cordialement,

     L'équipe de Quiz 
     <img src="/logo/bday.png" alt="Birthday Image">

     <a href="{{ route('home') }}">retourner au tableau de bord</a>
    </div>
   
</body>
</html>