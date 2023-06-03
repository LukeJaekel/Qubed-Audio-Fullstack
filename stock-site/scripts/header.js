/* Author:
   Luke Jaekel */

// Header becomes partially transparent on scrolling
const headerElements = document.getElementsByClassName('js-header');
window.onscroll = function(e) {
    posY = this.scrollY;
    for (var i = 0; i < headerElements.length; i++) {
        if (posY > 180) {
            headerElements[i].style.transition = "background-color 0.5s";
            headerElements[i].style.backgroundColor = "rgba(240, 240, 240, 0.8)";
        }
        else {
            headerElements[i].style.backgroundColor = "rgba(240, 240, 240, 1)";
        }
    }
}