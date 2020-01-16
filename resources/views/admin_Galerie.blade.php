@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-3"></div>
                <div class="card col-md-6">
                    <form method="post" enctype="multipart/form-data" action="{{route('ajout_img')}}">
                        {{csrf_field()}}
                        <h5>Ajouter une image à la galerie :</h5>
                        <div class="form-group">
                            <label class="labelForm" for="img">Choisissez votre image :</label>
                            <input type="file" class="form-control-file" id="img" name="img">
                            @if($errors->has('img'))
                                <p class="errorform">{{ $errors -> first('img') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Envoyer</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nom de l'image :</th>
                            <th scope="col">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($galeries as $galerie)
                            <tr>
                                <td>{{ $galerie -> chemin }}</td>
                                <td><form method="post" action="{{route('suppr_img')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $galerie -> id }}"></imput>
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