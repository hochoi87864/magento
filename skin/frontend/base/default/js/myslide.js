
var slidedisplay;
function showslide(){
    var i;
    var slides = document.getElementsByClassName("myslide");
    var dots = document.getElementsByClassName("dot");
    for(i=0; i<slides.length;i++){
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slidedisplay].style.display = "block";
    dots[slidedisplay].className += " active";
    slidedisplay++;
    if (slidedisplay > slides.length - 1) {
        slidedisplay = 0;
    }
    setTimeout(showslide,3000);
}
showslide(slidedisplay = 0);
function currentslide(n) {
    showslide(slidedisplay = n);
}