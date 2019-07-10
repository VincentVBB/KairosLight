@extends('layouts.navbar')
@section('body')
    <body id="accueil_body">
    @endsection

@section('main_content')
    <section id="parallax" class="keyart">
        <div id="ciel" class="keyart_layer parallax" data-speed="20"></div>
        <div id="sol" class="keyart_layer parallax" data-speed="60"></div>
        <div id="immeuble1" class="keyart_layer parallax" data-speed="-17"></div>
        <div id="immeuble2" class="keyart_layer parallax" data-speed="-17"></div>
        <div id="immeuble3" class="keyart_layer parallax" data-speed="-17"></div>
        <div id="immeuble4" class="keyart_layer parallax" data-speed="-17"></div>
        <div id="batiment1" class="keyart_layer parallax" data-speed="-13.5"></div>
        <div id="batiment2" class="keyart_layer parallax" data-speed="13"></div>
        <div id="batiment3" class="keyart_layer parallax" data-speed="15"></div>
        <div id="batiment4" class="keyart_layer parallax" data-speed="24"></div>
        <div id="batiment5" class="keyart_layer parallax" data-speed="25.9"></div>
    </section>

    <section class="keyart" id="contenu">
    </section>

@endsection





@section('endbody')
</body>
    @endsection