@extends('layouts.navbar')
@section('body')
    <body id="blog_body">
@endsection
@section('main_content')
    <section class="container-fluid">
        <div class="row">
            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/tetePage/teteBlog.png" style="width: 100%; height: 70%;max-height: 100%;">
        </div>
        <section class="row">
            <div class="col-md-8">

                @foreach($blogs as $blog)
                <div class="row" style="padding : 5%">
                    <article class="interface_blog">
                        <div class="row" style="padding-top: 2%; padding-bottom: 2%">
                            <div class="col-md-9">
                                <h3 class="titreBlog">{{$blog -> titre}}</h3>
                            </div>
                            <div class="col-md-3">
                                <p>Par : {{$admins[$blog -> id][0] -> prenom}}</p>
                            </div>
                        </div>

                        <img class="imgBlog" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/{{$blog -> photo}}">
                        @foreach($paragraphes[$blog -> id] as $paragraphe)
                        <p class="descBlog">{{$paragraphe -> paragraphe}}</p>
                        @endforeach
                        <div class="row col-md-12">
                                <div id="espacement">
                                    <button type="button" class="btn btn-success" onclick="seeModal('{{ $blog -> id }}')">Voir les commentaires</button>
                                </div>
                                <div style="width: 10%">
                                    <small class="dateBlog">{{$blog -> date}}</small>
                                </div>

                        </div>
                        <div class="modal" id="{{ $blog -> id }}" style="display: none">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                    <div class="modal-header" id="ModalHeadFoot">
                                        <p class="modal-title">Commentaire de la new : {{ $blog -> titre }}</p>
                                        <button type="button" class="close" onclick="noneModal('{{ $blog -> id }}')" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="ModalBody">
                                        @foreach($commentaires[$blog -> id] as $commentaire)
                                            <div style="padding-bottom: 1%">
                                                <div class="card" id="commentaire" style="padding: 1%;">
                                                    @auth()
                                                        <form method="post" action="{{route('suppr_commentaire_unique')}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" class="form-control" name="id" value="{{ $commentaire -> id }}"></imput>
                                                            <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endauth
                                                    <h6 style="margin: 1%">De : {{$commentaire -> pseudo}}</h6>
                                                    <p style="margin-left: 2%">{{$commentaire -> commentaire}}</p>
                                                    <small style="margin: 1%">Ecrit le : {{$commentaire -> date}}</small>
                                                    <button class="btn" style="background-color: #aaf47c" role="button" onclick="seeResponses({{ $commentaire -> id }})">{{sizeof($reponses[$commentaire -> id])}} réponse(s) :</button>
                                                        <div id="{{$commentaire -> id}}" style="display: none">
                                                            @foreach($reponses[$commentaire -> id] as $reponse)
                                                                <div style="padding-bottom: 1%">
                                                                    <div class="card" id="reponse" style="padding: 1%;">
                                                                        @auth()
                                                                            <form method="post" action="{{route('suppr_reponse_unique')}}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input type="hidden" class="form-control" name="id" value="{{ $reponse -> id }}"></imput>
                                                                                <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                                                            </form>
                                                                        @endauth
                                                                        <h6 style="margin: 1%">De : {{$reponse -> pseudo}}</h6>
                                                                        <p style="margin-left: 2%">{{$reponse -> description}}</p>
                                                                        <small style="margin: 1%">Ecrit le : {{$reponse -> date}}</small>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <div class="card" id="ajout-rep">
                                                                <form method="post" action="{{route('ajout_reponse')}}">
                                                                    @csrf
                                                                    <input type="hidden" class="form-control" name="id_commentaire" value="{{ $commentaire -> id }}"></imput>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="répond à {{$commentaire -> pseudo}} !"></textarea>
                                                                    @if($errors->has('description'))
                                                                        <p class="errorform">{{ $errors -> first('description') }}</p>
                                                                    @endif
                                                                    <label class="labelForm">Pseudo (facultatif) :</label>
                                                                    <input type="text" class="form-control" placeholder="votre pseudo" name="pseudo">
                                                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="modal-footer" id="ModalHeadFoot">
                                            <div class="container-fluid">
                                                <form method="post" action="{{route('ajout_commentaire')}}">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="id_blog" value="{{ $blog -> id }}"></imput>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="commentaire" placeholder="Commente cette new !"></textarea>
                                                    @if($errors->has('commentaire'))
                                                        <p class="errorform">{{ $errors -> first('commentaire') }}</p>
                                                    @endif
                                                    <label class="labelForm">Pseudo (facultatif) :</label>
                                                    <input type="text" class="form-control" placeholder="votre pseudo" name="pseudo">
                                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($blagues as $blague)
                    <section class="row" style="padding-top : 10%; padding-bottom: 10%; padding-left: 5%; padding-right: 10%">
                        <section class="interface_blog2">
                            <h5 class="titreBlog" style="margin: 2%">{{$blague -> titre}}</h5>
                            <p class="descBlog">{{$blague -> description}}</p>
                            <p class="dateBlog">{{$blague -> date}}</p>
                            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/{{$blague -> image}}" style="width: 100%; height: auto">
                            <div class="row">
                                <div class="col-md-12" style="padding: 5%">
                                    <div class="progress" style="height: 40px">
                                        <div class="progress-bar" role="progressbar" style="background-color: #48d043  ; width: {{(($evals[$blague->id][0] -> oui)/($evals[$blague->id][0] -> oui + $evals[$blague->id][0] -> non))*100}}%" aria-valuenow="{{(($evals[$blague->id][0] -> oui)/($evals[$blague->id][0] -> oui + $evals[$blague->id][0] -> non))*100}}" aria-valuemin="0" aria-valuemax="100">Oui ({{$evals[$blague->id][0] -> oui}})</div>
                                        <div class="progress-bar" role="progressbar" style="background-color: #ff4242 ; width: {{(($evals[$blague->id][0] -> non)/($evals[$blague->id][0] -> oui + $evals[$blague->id][0] -> non))*100}}%" aria-valuenow="{{(($evals[$blague->id][0] -> non)/($evals[$blague->id][0] -> oui + $evals[$blague->id][0] -> non))*100}}" aria-valuemin="0" aria-valuemax="100">Non ({{$evals[$blague->id][0] -> non}})</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="{{ route('oui') }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" class="form-control" name="id" value="{{$blague -> id}}">
                                        <button type="submit" class="btn" style="background-color: #87ae94; width: 100%">Oui</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="{{ route('non') }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" class="form-control" name="id" value="{{$blague -> id}}">
                                        <button type="submit" class="btn" style="background-color: #87ae94; width: 100%">Non</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </section>
                @endforeach
            </div>
        </section>
    </section>

    @endsection

@section('endbody')
    </body>
@endsection