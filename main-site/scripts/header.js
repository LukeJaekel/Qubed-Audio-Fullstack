/* Author:
   Luke Jaekel */

// Header becomes partially transparent on scrolling
const headerElements = document.getElementsByClassName('js-header');
window.onscroll = function(e) {
    posY = this.scrollY;
    for (var i = 0; i < headerElements.length; i++) {
        if (posY > 100) {
            headerElements[i].style.transition = "background-color 0.5s"
            headerElements[i].style.backgroundColor = "rgba(20, 20, 20, 0.8)";
        }
        else {
            headerElements[i].style.backgroundColor = "rgba(20, 20, 20, 1)";
        }
    }
}

// Expands and configures hamburger menu on smaller devices
const toggleButton = document.getElementsByClassName('menu-button')[0];
const navbarLinks = document.getElementsByClassName('nav-bar-links')[0];
const header = document.getElementsByClassName('js-header')[0];
toggleButton.addEventListener('click', (e) => {
    e.preventDefault();
    navbarLinks.classList.toggle('active');
    header.classList.toggle('active');
});