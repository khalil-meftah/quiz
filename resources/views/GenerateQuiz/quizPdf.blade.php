<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <style>

        .question {
            font-weight: 700;
        }
        .reponse{
            margin-bottom: 0.5em;
        }
        .header{
            width: 100%;
            border: 1px solid black;
        }
        td{
            padding: 0 1em;
        }

        .qcm div{
            margin-bottom: .5em;
        }
    </style>
    <div >
        <table class="header">
            <tr>
                <td colspan="2">
                    <img src="logo/ofpptLogo.png" alt="ofppt logo" width="80px">
                </td>
            </tr>
                <tr >
                    <td style="text-align: center;"colspan="2">
                        <h1>{{$data->type}}@if($data->type == 'Contrôle') n°{{$data->nControle}}@endif</h1>
                        <h2>AU TITRE DE L'ANNEE : {{$data->titreDanne1}}/{{$data->titreDanne2}}</h2>
                    </td>
                </tr>
                <!-- <tr>
                    <td>

                    </td>
                </tr> -->
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
        </table>
    </div> 
    <div class="qcm">
    <h3>QCM</h3>
    @foreach ($questions as $question)
        <div>
            <p class="question">{{$loop->index + 1}} - {{ $question->descriptionQuestion}} :</p>
                @foreach ($question->reponses as $reponse)
                        <div class="reponse"></div>
                            <input type="radio" >
                            <span class="reponse">{{ $reponse['descriptionReponse'] }}</span>
                        </div>
                @endforeach
        </div>
    @endforeach
    </div>
</body>
</html>
