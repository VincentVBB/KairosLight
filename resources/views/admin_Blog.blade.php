@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <form method="post" enctype="multipart/form-data" action="{{route('ajout_new')}}">
                        {{csrf_field()}}
                        <h5>Ajouter une New :</h5>
                        <div class="form-group">
                            <label class="labelForm">Titre :</label>
                            <input type="text" class="form-control" placeholder="titre de la new" name="titre">
                            @if($errors->has('titre'))
                                <p class="errorform">{{ $errors -> first('titre') }}</p>
                            @endif
                            <label class="labelForm" for="ImgNew">Choisissez votre image :</label>
                            <input type="file" class="form-control-file" id="img" name="img">
                            @if($errors->has('img'))
                                <p class="errorform">{{ $errors -> first('img') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Envoyer</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 60%">titre de la new :</th>
                            <th scope="col" style="width: 20%">Ajout paragraphe</th>
                            <th scope="col" style="width: 20%">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td style="width: 60%">{{ $blog -> titre }}</td>
                                <td style="width: 20%">
                                    <button type="button" class="btn" onclick="seeModal('{{ $blog -> id }}')">+</button>
                                        <div class="modal" id="{{ $blog -> id }}" style="display: none">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="modal-title">ajoute un paragraphe a la new : {{ $blog -> titre }}</p>
                                                        <button type="button" class="close" onclick="noneModal('{{ $blog -> id }}')" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('ajout_paragraphe')}}">
                                                            @csrf
                                                            <input type="hidden" class="form-control" name="id_blog" value="{{ $blog -> id }}"></imput>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="paragraphe" placeholder="paragraphe"></textarea>
                                                            @if($errors->has('paragraphe'))
                                                                <p class="errorform">{{ $errors -> first('paragraphe') }}</p>
                                                            @endif
                                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td style="width: 20%"><form method="post" action="{{route('suppr_new')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $blog -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <form method="post" enctype="multipart/form-data" action="{{route('ajout_blague')}}">
                        {{csrf_field()}}
                        <h5>Ajouter une blague :</h5>
                        <div class="form-group">
                            <label class="labelForm">Titre :</label>
                            <input type="text" class="form-control" placeholder="titre de la blague" name="titre">
                            @if($errors->has('titre'))
                                <p class="errorform">{{ $errors -> first('titre') }}</p>
                            @endif
                            <label class="labelForm" for="ImgNew">Choisissez votre image :</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @if($errors->has('image'))
                                <p class="errorform">{{ $errors -> first('image') }}</p>
                            @endif
                            <label class="labelForm">description :</label>
                            <input type="text" class="form-control" placeholder="description de la blague" name="description">
                            @if($errors->has('description'))
                                <p class="errorform">{{ $errors -> first('description') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Envoyer</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 70%">titre de la blague :</th>
                            <th scope="col" style="width: 30%">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blagues as $blague)
                            <tr>
                                <td style="width: 70%">{{ $blague -> titre }}</td>
                                <td style="width: 30%"><form method="post" action="{{route('suppr_blague')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $blague -> id }}"></imput>
                                        <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </section>
        </section>
    @endsection

    @section('endbody')
    </body>
@endsection