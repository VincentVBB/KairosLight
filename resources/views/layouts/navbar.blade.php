<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kairos Light</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Short+Stack" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/accueil.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/logo_temp.ico') }}" />
</head>
@yield('body')
<header>
    <nav class="navbar navbar-expand-lg navbar-light couleurNavbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="width: 90%">
            <a href="{{route('accueil')}}">
                <img id="accueil1" onmouseover="displaybutton('accueil2','accueil1')" onmouseout="displaybutton('accueil1','accueil2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Afr1.png"/>
                <img id="accueil2" onmouseover="displaybutton('accueil2','accueil1')" onmouseout="displaybutton('accueil1','accueil2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Afr2.png"/>
            </a>
            <a href="{{route('blog')}}">
                <img id="blog1" onmouseover="displaybutton('blog2','blog1')" onmouseout="displaybutton('blog1','blog2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Bfr1.png"/>
                <img id="blog2" onmouseover="displaybutton('blog2','blog1')" onmouseout="displaybutton('blog1','blog2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Bfr2.png"/>
            </a>
            <a href="{{route('demo')}}">
                <img id="demo1" onmouseover="displaybutton('demo2','demo1')" onmouseout="displaybutton('demo1','demo2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Dfr1.png"/>
                <img id="demo2" onmouseover="displaybutton('demo2','demo1')" onmouseout="displaybutton('demo1','demo2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Dfr2.png"/>
            </a>
            <a href="{{route('galerie')}}">
                <img id="galerie1" onmouseover="displaybutton('galerie2','galerie1')" onmouseout="displaybutton('galerie1','galerie2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Gfr1.png"/>
                <img id="galerie2" onmouseover="displaybutton('galerie2','galerie1')" onmouseout="displaybutton('galerie1','galerie2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Gfr2.png"/>
            </a>
            <a href="{{route('presskit')}}">
                <img id="presskit1" onmouseover="displaybutton('presskit2','presskit1')" onmouseout="displaybutton('presskit1','presskit2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/PressFr1.png"/>
                <img id="presskit2" onmouseover="displaybutton('presskit2','presskit1')" onmouseout="displaybutton('presskit1','presskit2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/PressFr2.png"/>
            </a>

            <a href="{{route('phasetest')}}">
                <img id="phasetest1" onmouseover="displaybutton('phasetest2','phasetest1')" onmouseout="displaybutton('phasetest1','phasetest2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/PhaseTestFr1.png"/>
                <img id="phasetest2" onmouseover="displaybutton('phasetest2','phasetest1')" onmouseout="displaybutton('phasetest1','phasetest2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/PhaseTestFr2.png"/>
            </a>
            <a href="{{route('noel')}}">
                <img id="noel1" onmouseover="displaybutton('noel2','noel1')" onmouseout="displaybutton('noel1','noel2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Noel1.png"/>
                <img id="noel2" onmouseover="displaybutton('noel2','noel1')" onmouseout="displaybutton('noel1','noel2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Noel2.png"/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            @auth()
                <a href="{{route('admin')}}">
                    <img id="admin1" onmouseover="displaybutton('admin2','admin1')" onmouseout="displaybutton('admin1','admin2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/MonCompteFr1.png"/>
                    <img id="admin2" onmouseover="displaybutton('admin2','admin1')" onmouseout="displaybutton('admin1','admin2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/MonCompteFr2.png"/>
                </a>
            @endauth
            <a href="https://www.facebook.com/KairosLight/" class="fa fa-facebook"></a>
            <a href="https://www.instagram.com/jeukairoslight/" class="fa fa-instagram"></a>
            <a href="https://twitter.com/KairosLight" class="fa fa-twitter"></a>
        </div>
    </nav>
</header>


@yield('main_content')
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row" style="justify-content: center;">
                <a href="https://www.facebook.com/KairosLight/" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/jeukairoslight/" class="fa fa-instagram"></a>
                    <small id="textFooter">© Tous droits réservés - 2019 || <a href="{{route('mentions')}}">Mentions légales</a> </small>
                <a href="https://twitter.com/KairosLight" class="fa fa-twitter"></a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{URL::asset('/js/accueil.js')}}" type="text/javascript"></script>

@yield('endbody')
</html>
