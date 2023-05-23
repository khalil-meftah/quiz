<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>  
    <title>Laravel 9 vite with react</title>
    <link rel="stylesheet" href="\css\app.css">
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</head>
<body>
    
    <div class="container">
            <div class="header">
                <img src="/logo/logo.png" alt="Logo" class="first-image">
        
                <div id="authLinks">
                    <a href="{{ route('login') }}">Connection</a>
                    <a href="{{ route('register') }}">Inscription</a>
                </div>
            </div>
            <div class="content">
                <blockquote>
                    <div id="lg">Quiz</div>
                    La plateforme ultime pour générer des examens avec facilité et précision!
                </blockquote>
            
                <img src="logo\motion-sansbg.png" alt="euh" class="second-image">
            </div>
       
    </div>

</body>
</html>
