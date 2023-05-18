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


// Initialises hamburger menu for smaller devices
document.addEventListener('DOMContentLoaded', function() {
    var menuButton = document.getElementById('menu-bar');
    var navbar = document.querySelector('.links');

    function toggleLinks() {
        if (window.innerWidth <= 1160) {
        navbar.style.display = menuButton.checked ? 'none' : 'flex';
        } else {
        navbar.style.display = 'flex';
        }
    }

    function toggleMenu() {
        navbar.style.display = menuButton.checked ? 'flex' : 'none';
    }

    toggleLinks();

    menuButton.addEventListener('click', function() {
        toggleLinks();
        toggleMenu();
    });

    window.addEventListener('resize', function() {
        toggleLinks();
    });
});