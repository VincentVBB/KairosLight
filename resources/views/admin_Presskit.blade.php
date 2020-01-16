@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-6 card">
                    <form method="post" action="{{route('change_info')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification INFO :</h5>
                        <div class="form-group">
                            <label>association</label>
                            <input type="text" class="form-control" placeholder="Nom de l'association" name="association">
                            <label>lieu</label>
                            <input type="text" class="form-control" placeholder="Où est basée l'association ?" name="lieu">
                            <label>prix</label>
                            <input type="text" class="form-control" placeholder="Prix du jeu" name="prix">
                            <label>contact</label>
                            <input type="text" class="form-control" placeholder="Email de contact" name="contact">
                            <label>langue</label>
                            <input type="text" class="form-control" placeholder="Langue du jeu" name="langue">
                            <label>plateforme</label>
                            <input type="text" class="form-control" placeholder="Plateforme du jeu" name="plateforme">
                            <label>réseaux sociaux</label>
                            <input type="text" class="form-control" placeholder="Lister les réseaux sociaux du jeu" name="reseaux">
                            <label>Date de sortie</label>
                            <input type="date" class="form-control" name="date_sortie">
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <form method="post" action="{{route('ajout_info_principale')}}">
                        @csrf
                        <h5>ajout paragraphe INFO Principale:</h5>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="paragraphe" placeholder="Info"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">ajout</button>
                    </form>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Paragraphe :</th>
                            <th scope="col">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($info_principales as $info_principale)
                            <tr>
                                <td>{{ $info_principale -> paragraphe }}</td>
                                <td><form method="post" action="{{route('suppr_info_principale')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $info_principale -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-6 card">
                    <form method="post" action="{{route('change_QNS')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification Qui sommes nous :</h5>
                        <div class="form-group">
                            <label class="labelForm">Ancienne description :</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="{{$presentation[0] -> qui_nous_sommes}}" name="qui_nous_sommes">
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <form method="post" action="{{route('change_YT_Link_presskit')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification TRAILER :</h5>
                        <div class="form-group">
                            <label class="labelForm">Lien youtube</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Lien de la vidéo youtube" name="link_YT">
                            @if($errors->has('link_YT'))
                                <p class="errorform">{{ $errors -> first('link_YT') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-6 card">
                    <form method="post" action="{{route('ajout_feature')}}">
                        {{csrf_field()}}
                        <h5>Ajouter une feature :</h5>
                        <div class="form-group">
                            <label class="labelForm">Titre :</label>
                            <input type="text" class="form-control" placeholder="titre de la feature" name="titre">
                            @if($errors->has('titre'))
                                <p class="errorform">{{ $errors -> first('titre') }}</p>
                            @endif
                            <label class="labelForm" for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Décrivez votre new"></textarea>
                            @if($errors->has('description'))
                                <p class="errorform">{{ $errors -> first('description') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Ajout</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 70%">titre de la feature :</th>
                            <th scope="col" style="width: 30%">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($features as $feature)
                            <tr>
                                <td style="width: 70%">{{ $feature -> titre }}</td>
                                <td style="width: 30%"><form method="post" action="{{route('suppr_feature')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $feature -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>





            <section class="row" style="padding-top: 5%">
                <div class="col-md-6 card">
                    <form method="post" action="{{route('ajout_a_venir')}}">
                        {{csrf_field()}}
                        <h5>Ajouter A_venir :</h5>
                        <div class="form-group">
                            <label class="labelForm">Titre :</label>
                            <input type="text" class="form-control" placeholder="titre de l'annonce" name="titre">
                            @if($errors->has('titre'))
                                <p class="errorform">{{ $errors -> first('titre') }}</p>
                            @endif
                            <label class="labelForm" for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Décrivez votre new"></textarea>
                            @if($errors->has('description'))
                                <p class="errorform">{{ $errors -> first('description') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Ajout</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 70%">Titre A_venir :</th>
                            <th scope="col" style="width: 30%">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($a_venir as $aVenir)
                            <tr>
                                <td style="width: 70%">{{ $aVenir -> titre }}</td>
                                <td style="width: 30%"><form method="post" action="{{route('suppr_a_venir')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $aVenir -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>



            <section class="row" style="padding-top: 5%">
                <div class="col-md-6 card">
                    <form method="post" action="{{route('ajout_opdn')}}">
                        {{csrf_field()}}
                        <h5>Ajouter un lien ou on parle de vous :</h5>
                        <div class="form-group">
                            <label class="labelForm">lien :</label>
                            <input type="text" class="form-control" placeholder="lien" name="lien">
                            @if($errors->has('lien'))
                                <p class="errorform">{{ $errors -> first('lien') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Ajout</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 70%">lien :</th>
                            <th scope="col" style="width: 30%">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($opdns as $opdn)
                            <tr>
                                <td style="width: 70%">{{ $opdn -> lien }}</td>
                                <td style="width: 30%"><form method="post" action="{{route('suppr_opdn')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $opdn -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>




        </section>
    @endsection

    @section('endbody')
    </body>
@endsection