<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pending.css') }}" >

    <link rel="icon" href="logo\quiz.svg" type="image/png" sizes="16x16">

    <style>
        .container{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
            margin-top: 2rem;
        }

        @media screen and (max-width: 700px) {
            .container{
            font-size: 1.2rem;
            }
            p{
                width: 70%;
            }
        }
    </style>

</head>
<body>

        <a href="{{ url('/') }}">
            <img src="{{ asset('logo/logo.svg') }}" alt="Logo" class="logo">
        </a> 
    <div class="container">
        <h1>404</h1>
        <h2>Page non trouvée</h2>
        <p>La page que vous recherchez n'existe pas ou a été déplacée.</p>
    </div>

    
</body>
</html> 
