@extends('layouts.navbar')
@section('body')
    <body id="accueil_body">
    @endsection

@section('main_content')

    <section id="ordi" class="keyart" style="overflow: hidden">

        <div id="ciel" class="keyart_layer parallax" data-speed="0"></div>
        <div id="avion" class="keyart_layer parallax" data-speed="5"></div>
        <div id="logo" class="keyart_layer parallax" data-speed="5"></div>
        <div id="bastransition" class="keyart_layer parallax" data-speed="95"></div>
        <div id="sol" class="keyart_layer parallax" data-speed="8"></div>
        <div id="nuage3" class="keyart_layer parallax" data-speed="50"></div>
        <div id="immeubles" class="keyart_layer parallax" data-speed="5"></div>
        <div id="batiment1" class="keyart_layer parallax" data-speed="17"></div>
        <div id="batiment2" class="keyart_layer parallax" data-speed="45"></div>
        <div id="nuage2" class="keyart_layer parallax" data-speed="120"></div>
        <div id="batiment3" class="keyart_layer parallax" data-speed="50"></div>
        <div id="batiment4" class="keyart_layer parallax" data-speed="80"></div>
        <div id="nuage1" class="keyart_layer parallax" data-speed="230"></div>
        <div id="batiment5" class="keyart_layer parallax" data-speed="89"></div>
        <div id="nuage4" class="keyart_layer parallax" data-speed="90"></div>


    </section>
    <section class="container-fluid main_content">
        <section class="row" id="mobile">
            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Parallax/NonParallax.png" style="width: 100%;">
        </section>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="position: relative">
                <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Interface/IterfTrailerV2.png" style="width:100%;" alt="InterfaceTrailer">
                <iframe id="VideoTrailer" src={{ $lien_youtube -> lien_youtube }} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-1"></div>
        </div>
        <section class="row transition"></section>
        <section class="row" style="padding-bottom: 5%;">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <a href="#">
                    <img id="linkDL1" onmouseover="displaybutton('linkDL2','linkDL1')" onmouseout="displaybutton('linkDL1','linkDL2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/LinkDL1.png"/>
                    <img id="linkDL2" onmouseover="displaybutton('linkDL2','linkDL1')" onmouseout="displaybutton('linkDL1','linkDL2')" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Bouton/LinkDL2.png"/>
                </a>
            </div>
            <div class="col-md-1"></div>
        </section>
        <section class="row transition"></section>


        <section class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <p class="textePresentation">{{$info_jeu -> info_jeu}}</p>
                @foreach($paragraphes as $paragraphe)
                    <p class="textePresentation">{{$paragraphe -> paragraphe}}</p>
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </section>
    </section>


@endsection





@section('endbody')
</body>
    @endsection