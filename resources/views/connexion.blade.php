@extends('layouts.navbar')
@section('body')
    <body id="connexion_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <section class="card cardConnexion">
                        <p>Connexion utilisateur :</p>
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adresse Email</label>
                                <input type="email" class="form-control imputColorConnexion" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                                @if($errors->has('email'))
                                    <p class="errorform">{{ $errors -> first('email') }}</p>
                                @endif
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" class="form-control imputColorConnexion" id="exampleInputPassword1" placeholder="Mot de passe" name="password">
                                @if($errors->has('password'))
                                    <p class="errorform">{{ $errors -> first('password') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-info">Connexion</button>
                        </form>
                        <button type="button" onclick="location.href='{{ route('inscription') }}'" class="btn btn-info">Pas encore inscrit ?</button>

                        <button type="button" onclick="location.href='{{ route('connexionAdmin') }}'" class="btn btn-info"><span class="fa fa-gears"></span> Administrateur ?</button>
                    </section>
                </div>
                <div class="col-md-2"></div>
            </section>
        </section>
    @endsection

    @section('endbody')
    </body>
@endsection