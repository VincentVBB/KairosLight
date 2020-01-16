@extends('layouts.navbar')
@section('body')
    <body id="demo_body">
@endsection
@section('main_content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                            src="{{URL::asset('https://www.entrepot.ovh/~vincent/MiniJeuNoelV3/')}}" gesture="media"  allow="encrypted-media" allowfullscreen class="embed-responsive-item" width="100%"; height="100%">
                    </iframe>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </section>

    @endsection

@section('endbody')
    </body>
@endsection
