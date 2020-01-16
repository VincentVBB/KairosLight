@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="card col-md-8" style="padding: 1%">
                    <p class="titreForm">Inscrire un ADMIN :</p>
                    <form method="post" action="{{route('addAdmin')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Adresse Email</label>
                            <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Email" name="email">
                            <label>Mot de passe</label>
                            @if($errors->has('email'))
                                <p class="errorform">{{ $errors -> first('email') }}</p>
                            @endif
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                            <label></label>
                            @if($errors->has('password'))
                                <p class="errorform">{{ $errors -> first('password') }}</p>
                            @endif
                            <input type="password" class="form-control" placeholder="Mot de passe (confirmation)" name="password_confirmation">
                            @if($errors->has('password_confirmation'))
                                <p class="errorform">{{ $errors -> first('password_confirmation') }}</p>
                            @endif

                            <p>Facultatif :</p>

                            <label>Région</label>
                            <input type="text" class="form-control imputColorInscription"  aria-describedby="emailHelp" placeholder="Où habitez vous ?" name="region">
                            <label>Date de naissance</label>
                            <input type="date" class="form-control imputColorInscription" placeholder="Vot' année de naissance ouech" name="date_naissance">
                            <label>Prenom</label>
                            <input type="text" class="form-control imputColorInscription" placeholder="Prenom" name="prenom">
                            <label>Nom</label>
                            <input type="text" class="form-control imputColorInscription" placeholder="Nom" name="nom">
                            <!--
                            <label>Avatar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label imputColor" for="avatar">Choose file</label>
                            </div>
                            !-->
                        </div>
                        <button type="submit" class="btn btn-info">Inscrire un Admin</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="card col-md-5" style="padding: 1%">
                    <p class="titreForm">Changement MAIL :</p>
                    <form method="post" action="{{route('changeEmailAdmin')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification Email :</h5>
                        <div class="form-group">
                            <label class="labelForm">Adresse Email</label>
                            <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Email" name="emailChange">
                            @if($errors->has('emailChange'))
                                <p class="errorform">{{ $errors -> first('emailChange') }}</p>
                            @endif
                            <label class="labelForm">Confirmation</label>
                            <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Confirmez votre email" name="emailChange_confirmation">
                            @if($errors->has('emailChange_confirmation'))
                                <p class="errorform">{{ $errors -> first('emailChange_confirmation') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
                <div class="card col-md-5" style="padding: 1%">
                    <p class="titreForm">Changement MDP :</p>
                    <form method="post" action="{{route('changePasswordAdmin')}}">
                        @csrf
                        @method('PUT')
                        <h5>Modification mot de passe :</h5>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                            @if($errors->has('password'))
                                <p class="errorform">{{ $errors -> first('password') }}</p>
                            @endif
                            <label>Confirmation</label>
                            <input type="password" class="form-control" placeholder="Confirmation" name="password_confirmation">
                            @if($errors->has('password_confirmation'))
                                <p class="errorform">{{ $errors -> first('password_confirmation') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
            </section>
            <section class="row" style="padding-top: 5%; padding-bottom: 5%">
                <div class="col-md-2"></div>
                <div class="card col-md-8" style="padding: 1%">
                    <p class="titreForm">Changement OPTIONNELS :</p>
                    <form method="post" action="{{route('changeOptionnelAdmin')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Région</label>
                            <input type="text" class="form-control" placeholder="Où habitez vous maintenant ?" name="region">
                            <label>Date de naissance</label>
                            <input type="date" class="form-control" placeholder="Vot' année de naissance ouech, la vrai stp" name="date_naissance">
                            <label>Prenom</label>
                            <input type="text" class="form-control" placeholder="Prenom" name="prenom">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nom">
                            <!--
                            <label>Avatar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label imputColor" for="avatar">Choose file</label>
                            </div>
                            !-->
                        </div>
                        <button type="submit" class="btn btn-info">Changer</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </section>
            <section class="row" style="padding-top: 5%">
                <div class="card col-md-6" style="padding: 1%">
                    <p class="titreForm">Ajoute un membre a ton équipe :</p>
                    <form method="post" enctype="multipart/form-data" action="{{route('ajout_membre')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>role</label>
                            <input type="text" class="form-control imputColorInscription" placeholder="rôle" name="role">
                            @if($errors->has('role'))
                                <p class="errorform">{{ $errors -> first('role') }}</p>
                            @endif
                            <label>date d'entrée</label>
                            <input type="date" class="form-control imputColorInscription" name="date_entree">
                            @if($errors->has('date_entree'))
                                <p class="errorform">{{ $errors -> first('date_entree') }}</p>
                            @endif
                            <label>Prenom</label>
                            <input type="text" class="form-control imputColorInscription" placeholder="Prenom" name="prenom">
                            @if($errors->has('prenom'))
                                <p class="errorform">{{ $errors -> first('prenom') }}</p>
                            @endif
                            <label>Nom</label>
                            <input type="text" class="form-control imputColorInscription" placeholder="Nom" name="nom">
                            @if($errors->has('nom'))
                                <p class="errorform">{{ $errors -> first('nom') }}</p>
                            @endif
                            <label>Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Décrivez votre rôle"></textarea>
                            @if($errors->has('description'))
                                <p class="errorform">{{ $errors -> first('description') }}</p>
                            @endif
                            <label class="labelForm" for="photo">Choisissez votre photo :</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                            @if($errors->has('photo'))
                                <p class="errorform">{{ $errors -> first('photo') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">ajouter un membre</button>
                    </form>
                </div>
                <div class="col-md-6 card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">nom :</th>
                            <th scope="col">prenom :</th>
                            <th scope="col">role :</th>
                            <th scope="col">supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipes as $equipe)
                            <tr>
                                <td>{{ $equipe -> nom }}</td>
                                <td>{{ $equipe -> prenom }}</td>
                                <td>{{ $equipe -> role }}</td>
                                <td><form method="post" action="{{route('suppr_membre')}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id" value="{{ $equipe -> id }}"></imput>
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