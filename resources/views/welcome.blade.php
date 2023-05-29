<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="logo\quiz.svg" type="image/svg" sizes="16x16">
    <title>Quiz</title>
    <link rel="stylesheet" href="\css\app.css">
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</head>
<body>
    
    <div class="container">
            <nav class="header">
                <img src="/logo/logo.svg" alt="Logo" class="first-image">
                
        
                <ul id="authLinks">
                    <li><a href="{{ route('login') }}">Connection</a></li>
                    <li><a href="{{ route('register') }}" >Inscription</a></li>
                </ul>
            </nav>
            <div class="content">
                <div>
                <p>
                    <span>Quiz</span>
                    la plateforme ultime pour générer des examens avec facilité et précision!
                </p>
                <a href="{{ route('register') }}" class="inscription">Inscrivez vous maintenant</a>
                </div>
                <img src="logo\hero.svg" alt="euh" class="second-image">
                
            </div>
       
    </div>

</body>
</html>
