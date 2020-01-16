@extends('layouts.navbar')
@section('body')
    <body id="connexion_body">
    @endsection
    @section('main_content')
        <section class="container">
            <section class="row" style="padding-top: 5%">
                COUCOU UTILISATEUR
                <form method="post" action="{{ route('logout') }}">
                    {{csrf_field()}}
                    <button class="btn" type="submit"><i class="btn"></i></button>
                </form>
            </section>
        </section>
    @endsection

    @section('endbody')
    </body>
@endsection