@extends('layouts.navbar')
@section('body')
    <body id="demo_body">
@endsection
@section('main_content')
    <section class="container-fluid">
        <div class="row">
            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/tetePage/teteDemo.png" style="width: 100%; height: 70%;max-height: 100%;">
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 style="text-align: center">Ici, c'est une petite démo qui s'arrête a la fin du tutoriel. Pour vraiment tester le jeu, c'est <a href="{{route('phasetest')}}">ici</a> ! </h3>
                <div class="embed-responsive embed-responsive-16by9" id="demoOrdi">

                    <iframe
                            src="{{URL::asset('https://www.entrepot.ovh/~vincent/demo_jeu/')}}" gesture="media"  allow="encrypted-media" allowfullscreen class="embed-responsive-item">
                    </iframe>
                </div>
                <h2 id="noDemo" style="text-align: center">La démo n'est valable que sur ordinateur (pour le moment).</h2>
            </div>
            <div class="col-md-1"></div>

        </div>
    </section>

    @endsection

@section('endbody')
    </body>
@endsection