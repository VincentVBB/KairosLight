@extends('layouts.navbar')
@section('body')
    <body id="galerie_body">
    @endsection

@section('main_content')
    <section class="container-fluid">
        <div class="row">
            <img src="https://www.entrepot.ovh/~vincent/IMGKairosLight/tetePage/teteGalerie.png" style="width: 100%; height: 70%;max-height: 100%;">
        </div>
        <div class="row" style="padding-top: 5%; padding-bottom: 5%">
        @foreach($galeries as $galerie)
            <div class="col-md-4" style="padding-bottom: 2%">
                <img onclick="galerie_js({{$galerie -> id}})" id="myImg" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/{{$galerie -> chemin}}" style="width:100%;max-width:400px">

                <div id="myModal{{$galerie -> id}}" class="modal">

                    <span onclick="closeImg({{$galerie -> id}})" class="close">&times;</span>

                    <img class="modal-content" src="https://www.entrepot.ovh/~vincent/IMGKairosLight/{{$galerie -> chemin}}">
                </div>
            </div>
        @endforeach
        </div>
    </section>



@endsection





@section('endbody')
<script>
    //------------------GALERIE JS--------------------------------
    // Get the modal
    var modal = document.getElementById("myModal");
    var img = document.getElementById("myImg");
    function galerie_js(modalId){
        document.getElementById(('myModal'+modalId)).style.display = "block";
        modalId.src = this.src;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    function closeImg(ID) {
        document.getElementById(('myModal'+ID)).style.display = "none";
    }
    // When the user clicks on <span> (x), close the modal

</script>
</body>
    @endsection