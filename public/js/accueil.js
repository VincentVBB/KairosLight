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
            yPos = -((top * speed/70)**2) / 110;
            if (top <= 400){
                if (layer.getAttribute('id') === 'sol'){
                    rotateX = (top * speed / 340);
                    layer.setAttribute('style', 'transform: rotateX(' + rotateX + 'deg);');
                }
                else if (layer.getAttribute('id') === 'batiment4' || layer.getAttribute('id') === 'batiment5' || layer.getAttribute('id') === 'nuage1' ||layer.getAttribute('id') === 'nuage2') {
                    layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
                }
                else{
                    layer.setAttribute('style', 'transform: translate3d(0px, ' + -yPos + 'px, 0px)');
                }
            }
        }
    });
}



document.body.onload = castParallax();