<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kairos Light</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/Iconev0.ico') }}" />
</head>
@yield('body')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark alert-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <a href="{{route('accueil')}}">
                <img id="accueil1" onmouseover="displaybutton('accueil2','accueil1')" onmouseout="displaybutton('accueil1','accueil2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Afr1.png"/>
                <img id="accueil2" onmouseover="displaybutton('accueil2','accueil1')" onmouseout="displaybutton('accueil1','accueil2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/Afr2.png"/>
            </a>
            <a class="btn btn-primary" href="{{route('admin')}}" role="button">Admin</a>
            <a class="btn btn-primary" href="{{route('admin_Accueil')}}" role="button">AccueilModif</a>
            <a class="btn btn-primary" href="{{route('admin_Galerie')}}" role="button">GalerieModif</a>
            <a class="btn btn-primary" href="{{route('admin_Blog')}}" role="button">BlogModif</a>
            <a class="btn btn-primary" href="{{route('admin_Presskit')}}" role="button">PresskitModif</a>
            <a class="btn btn-primary" href="{{route('admin_phasetest')}}" role="button">Phasetest</a>

            <form method="post" action="{{ route('logout') }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Déconnexion</button>
            </form>
        </div>

    </nav>
</header>


@yield('main_content')


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{URL::asset('/js/accueil.js')}}" type="text/javascript"></script>

@yield('endbody')
</html>