@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-3"></div>
                <div class="card col-md-6">
                    <form method="post" action="{{route('change_YT_Link')}}">
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
                    <form method="post" action="{{route('change_info_jeu')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification INFO JEU :</h5>
                        <div class="form-group">
                            <label class="labelForm" for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info_jeu" placeholder="Décrivez votre new"></textarea>
                            @if($errors->has('info_jeu'))
                                <p class="errorform">{{ $errors -> first('info_jeu') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajout paragraphe</button>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('ajout_paragraphe_info')}}">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id_info" value="{{ $presentation[0] -> id }}"></imput>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="paragraphe" placeholder="paragraphe"></textarea>
                                        @if($errors->has('paragraphe'))
                                            <p class="errorform">{{ $errors -> first('paragraphe') }}</p>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </section>
        </section>
    @endsection

    @section('endbody')
    </body>
@endsection