<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo\quiz.svg" type="image/png" sizes="16x16">

    <title>Correction Quiz</title>
</head>
<body>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            
        }
        body{
            font-size: 14px;
            margin: 3em 5em;
        }
        div{
            margin: .5em 0;
        }
        .header{
            width: 100%;
            border: 1px solid black;
            padding: .7em;
        }
        .header-title{
            font-size: .8em;
            text-align: center;
            column-span: all;
            padding-bottom: .4em;
        }
        .info td{
            padding: .2em;
        }
        .qcm h3{
            font-size: 1.1em;
            text-decoration: underline;
        }
        .question{
            margin: .05em 0;
        }
        .reponse{
            padding-left: 2em;
        }
        .answer{
            margin-left: .5em;
        }
        .answer-green{
            color: green;
        }
        .answer-red{
            color: red;
        }

    </style>
    <div class="ofppt">
        <img src="logo/ofpptLogo.png" alt="ofppt logo" width="65px">
    </div>
    
    
    <table class="header">
        <tr>
            <td class="header-title" colspan="2">
                <h1>{{$data->type}}@if($data->type == 'Contrôle') n°{{$data->nControle}}@endif</h1>
                <h2>Fiche De Correction</h2>
                <h2>AU TITRE DE L'ANNEE : {{$data->titreDanne1}}/{{$data->titreDanne2}}</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p>Filière: {{ $data['filiere'] }}</p>
                <p>Niveau: {{ $data['niveau'] }}</p>
                <p>Numéro de module: {{ $data['numModule'] }}</p>
                <p>Intitulé du module: {{ $data['intituleModule'] }}</p>
                <p>Date d'évaluation: {{ $data['dateEvaluation'] }}</p>
            </td>
            <td>
                <p>Année de formation: {{ $data['anneDeFormation'] }}A</p>
                <p>Épreuve: Théorique</p>
                <p>Durée: {{ $data['duree'] }} Heures</p>
                <p>Variante: V{{ $data['variante'] }}</p>
                <p>Bareme: /{{ $data['bareme'] }}</p>
            </td>
        </tr>
        <tr class="info">
            <td>Nom & Prénom : .............................................</td>
            <td>Groupe : ............................................</td>
        </tr>
    </table>
    <div class="qcm">
    <h3>QCM {{$data['bareme']/20}} point par question ({{$data['bareme']}}pts) - Correction</h3>
    @foreach ($questions as $question)
        <table class="question">
            <tr>
                <td>
                    <p class="question">{{ $question->descriptionQuestion}}</p>
                </td>
            </tr>
            @foreach ($question->reponses as $reponse)
            <tr>
                <td class="reponse">
                    <span>{{$loop->index + 1}} - {{ $reponse['descriptionReponse'] }} <span>
                    @if($reponse['valeurReponse'] == 1)
                    <span class="answer answer-green">Vrai</span>
                    @endif
                    @if($reponse['valeurReponse'] == 0)
                    <span class="answer answer-red">Faux</span>
                    @endif
                </span>
                </td>
            </tr>
            @endforeach

        </table>
    @endforeach
    </div>
</body>
</html>
