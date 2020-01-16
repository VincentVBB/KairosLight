@extends('layouts.navbar')
@section('body')
    <body style="background-color: #a4f7e7;">
    @endsection
    @section('main_content')

        <div class="container-fluid" id="inscription_body" style="position: relative">
            <section class="row" style="padding-top: 27%">
                <div class="col-md-12" style="position: relative">
                    <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/Interface/interfaceInscription.png" id="InterfaceInscription" alt="InterfaceInscription">
                    <div class="formIMG">
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Adresse Email</label>
                                <input type="email" class="form-control imputColorInscription"  aria-describedby="emailHelp" placeholder="Email" name="email">
                                <label>Mot de passe</label>
                                @if($errors->has('email'))
                                    <p class="errorform">{{ $errors -> first('email') }}</p>
                                @endif
                                <input type="password" class="form-control imputColorInscription" placeholder="Mot de passe" name="password">
                                <label></label>
                                @if($errors->has('password'))
                                    <p class="errorform">{{ $errors -> first('password') }}</p>
                                @endif
                                <input type="password" class="form-control imputColorInscription" placeholder="Mot de passe (confirmation)" name="password_confirmation">
                                @if($errors->has('password_confirmation'))
                                    <p class="errorform">{{ $errors -> first('password_confirmation') }}</p>
                                @endif
                            </div>
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
                                        </div>!-->

                            <button type="submit" class="btn btn-info">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('endbody')
    </body>
@endsection