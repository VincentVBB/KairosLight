
function displaybutton(id1,id2){
    var element1 = document.getElementById(id1);
    var element2 = document.getElementById(id2);
    element1.style.display = "block";
    element2.style.display = "none";
}


function castParallax() {



    window.addEventListener("scroll", function(event){

        var top = this.pageYOffset;

        var layers = document.getElementsByClassName("parallax");
        var layer, speed, yPos,rotateX;
        for (var i = 0; i < layers.length; i++) {
            layer = layers[i];
            speed = layer.getAttribute('data-speed');
            yPos = Math.sqrt(((top*speed/200))**2);


            if (layer.getAttribute('id') === 'sol') {
                rotateX = Math.sqrt(top * speed);
                layer.setAttribute('style', 'transform: rotateX(' + rotateX + 'deg);');
            }
            else if (layer.getAttribute('id') === 'avion'){
                layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
            }
            else{
                layer.setAttribute('style', 'transform: translate3d(0px, ' + -yPos + 'px, 0px)');
            }
        }
    });
}



document.body.onload = castParallax();

function seeModal(id){
    document.getElementById(id).style.display = "block";
}
function noneModal(id){
    document.getElementById(id).style.display = "none";
}




function seeResponses(id){
    if (document.getElementById(id).style.display === "none"){
        document.getElementById(id).style.display = "block";
    }
    else{
        document.getElementById(id).style.display = "none";
    }
}


