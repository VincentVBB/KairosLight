@extends('layouts.navbarAdmin')
@section('body')
    <body id="admin_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <h3 style="text-align: center">Liste des inscrits aux phases de test : ({{sizeof($phasetests)}} inscrits.)</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nom :</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($phasetests as $phasetest)
                            <tr>
                                <td>{{ $phasetest -> nom }}</td>
                                <td>{{ $phasetest -> prenom }}</td>
                                <td>{{ $phasetest -> email }}</td>
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