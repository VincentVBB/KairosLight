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
    <link rel="stylesheet" href="{{ URL::asset('/css/accueil.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/tete.ico') }}" />
</head>
@yield('body')
<header>
    <nav class="navbar navbar-expand-lg navbar-light couleurNavbar">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <a class="navbar-brand" href="#">
                <img onmouseover="displaybutton('btnHome2','btnHome1')" onmouseout="displaybutton('btnHome1','btnHome2')" src="http://localhost:100/KairosLight/public/test1.png" id="btnHome1"/>
                <img onmouseover="displaybutton('btnHome2','btnHome1')" onmouseout="displaybutton('btnHome1','btnHome2')" src="http://localhost:100/KairosLight/public/test2.png" id="btnHome2"/>
            </a>
            <a href="#">
                <img onmouseover="displaybutton('btnHome4','btnHome3')" onmouseout="displaybutton('btnHome3','btnHome4')" src="http://localhost:100/KairosLight/public/test1.png" id="btnHome3"/>
                <img onmouseover="displaybutton('btnHome4','btnHome3')" onmouseout="displaybutton('btnHome3','btnHome4')" src="http://localhost:100/KairosLight/public/test2.png" id="btnHome4"/>
            </a>
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