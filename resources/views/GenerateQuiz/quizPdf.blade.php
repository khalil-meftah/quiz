<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
    <style>
        .question {
            font-weight: 700;
        }
        .reponse{
            margin-right: 5em;
        }
    </style>
    @foreach ($questions as $question)
        <p class="question">{{$loop->index + 1}} - {{ $question->descriptionQuestion }}</p>
            @foreach ($question->reponses as $reponse)
                    <input type="radio" >
                    <span class="reponse">{{ $reponse['descriptionReponse'] }}</span>
            @endforeach
    @endforeach
</body>
</html>
