@extends('layouts.navbar')
@section('body')
    <body id="presskit_body">
@endsection
@section('main_content')
    <section class="container-fluid">
        <div class="row">
            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/tetePage/tetePresskit.png" style="width: 100%; height: 70%;max-height: 100%;">
        </div>
        <section class="row" style="padding-top: 1%">
            <div class="col-md-4"></div>
            <div class="col-md-4">
        <a download href="https://www.kairoslight.fr/presskit2020.pdf" style="text-align: center">Télécharge le presskit en version PDF</a>
            </div>
            <div class="col-md-4"></div>
        </section>
        <section class="row" style="padding-top: 1%">
            <div class="col-md-4 interface_presskit">
                <p class="infoJeutitre" style="margin-top: 6%;"> Association :</p><p class="infojeu"> {{$info[0] -> association}}, basée à {{$info[0] -> lieu}}</p>
                <p class="infoJeutitre">Date de sortie :</p><p class="infojeu"> {{substr($info[0] -> date_sortie, 0, 4)}}</p>
                <p class="infoJeutitre">Plateformes :</p><p class="infojeu"> {{$info[0] -> plateforme}}</p>
                <p class="infoJeutitre">Prix :</p><p class="infojeu"> {{$info[0] -> prix}}</p>
                <p class="infoJeutitre">Langue :</p><p class="infojeu"> {{$info[0] -> langue}}</p>
                <p class="infoJeutitre">Contact :</p><p class="infojeu"> {{$info[0] -> contact}}</p>
                <p class="infoJeutitre">Réseaux sociaux :</p><p class="infojeu" style="margin-bottom : 6%;"> {{$info[0] -> reseaux}}</p>

            </div>
            <div class="col-md-8 interface_presskit">
                @foreach($info_principales as $info_principale)
                    <p id="presentationjeu">{{$info_principale -> paragraphe}}</p>
                @endforeach
            </div>
        </section>
        <section class="row" style="padding: 2%;">
            <article>
                <h2 class="titrePresskit">Qui sommes nous ?</h2>
                <p id="qns">{{$presentation[0] -> qui_nous_sommes}}</p>
            </article>
        </section>
        <section class="row" style="padding: 2%;">
            <h2 class="titrePresskit">Equipe :</h2>
            <div class="container-fluid">
                <section class="row" style="padding: 2%;">
                    @foreach($equipes as $equipe)
                        <div class="col-md-3">
                            <div class="card" style="background-color: #fffbaf">
                                <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/{{$equipe -> photo}}" alt="PhotoEquipe" style="width:100%">
                                <div class="container">
                                    <h3 style="text-align: center">{{$equipe -> prenom}} {{$equipe -> nom}}</h3>
                                    <p class="titleEquipe">{{$equipe -> role}}</p>
                                    <p>{{$equipe -> description}}</p>
                                    <p id="membre_depuis">Membre depuis : </p>
                                    <p>{{$equipe -> date_entree}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </section>
        <section class="row" style="padding: 2%;">
                <div class="container-fluid">
                    <h2 class="titrePresskit">Features :</h2>
                    <section class="row" style="padding: 2%;">
                        @foreach($features as $feature)
                            <div class="col-md-3">
                                <div class="card" style="background-color: #fffbaf">
                                    <div class="container">
                                        <h3 style="text-align: center">{{$feature -> titre}}</h3>
                                        <p style="text-align: center">{{$feature -> description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
        </section>
        <section class="row" style="padding: 2%;">
            <article style="width: 100%">
                <h2 class="titrePresskit">À venir :</h2>
                <table class="table table-hover">
                    <thead style="background-color: #f1f16b">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($a_venir as $aVenir)
                    <tr>
                        <td style="width: auto">{{$aVenir -> titre}}</td>
                        <td>{{$aVenir -> description}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </article>
        </section>
        <section class="row" style="padding: 2%;">
            <article>
                <h2 class="titrePresskit">Trailer :</h2>
                <a href="{{$presentation[0] -> lien_youtube_presskit}}">{{$presentation[0] -> lien_youtube_presskit}}</a>
            </article>
        </section>
        <section class="row" style="padding: 2%;">
            <article>
                <h2 class="titrePresskit">Images :</h2>
                <a href="{{route('galerie')}}">https://www.kairoslight.fr/galerie</a>
            </article>
        </section>
        <section class="row" style="padding: 2%;">
            <article>
                <h2 class="titrePresskit">Logo :</h2>
                <a download href="https://www.kairoslight.fr/Logo.png">Télécharger le logo</a>
            </article>
        </section>
        <section class="row" style="padding: 2%;">
            <article>
                <h2 class="titrePresskit">On parle de nous :</h2>
                @foreach($opdns as $opdn)
                    <p>- <a download href="{{$opdn -> lien}}">{{$opdn -> lien}}</a></p>
                @endforeach
            </article>
        </section>
    </section>

    @endsection

@section('endbody')
    </body>
@endsection