@extends('layouts.navbar')
@section('body')
    <body style="background-color: #a4f7e7;">
    @endsection
    @section('main_content')

        <div class="container-fluid" id="inscription_body" style="position: relative">
            <section class="row" style="padding-top: 28%">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="position: relative">
                    <div class="interface_phasetest">

                        <p class="descPhase">
                            L'inscription aux phases de test est terminée !
                        </p>
                        <p class="descPhase">
                            on améliore le jeu et on se retrouve pour les prochaines phases de test.
                        </p>
                        <p class="descPhase">
                            Les dates ne sont pas encore définies !
                        </p>

                        </div>

                    </div>
                <div class="col-md-3"></div>
            </section>

            <section class="row" style="padding-top: 10%; padding-bottom: 5%;">
                <div class="col-md-3"></div>
                <div class="col-md-6 interface_phasetest2">
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeMyNFJFfPDj2KfrBhR7tmIoAyoxpyo6V4YwPK2rBNljbv8uQ/viewform?embedded=true" width="100%" height="1500px" frameborder="0" marginheight="0" marginwidth="0" allowfullscreen scrolling="auto">Chargement…</iframe>
                </div>
                <div class="col-md-3"></div>

            </section>
        </div>
    @endsection

    @section('endbody')
    </body>
@endsection