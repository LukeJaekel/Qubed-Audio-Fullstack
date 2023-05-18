/* Author:
   Luke Jaekel */

function loadHomePage() {
    window.location.href = "home.html";
}

function loadMainSite() {
    window.location.href = "../main-site/home.html";
}

document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll("a");
  
    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link behavior
      });
    }
});