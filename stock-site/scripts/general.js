/* Author:
   Luke Jaekel */

function loadHomePage() {
    window.location.href = "../main-site/home.html";
}

function loadStockPage() {
    window.location.href = "stock.php";
}

function loadMainSite() {
    window.location.href = "../main-site/home.html";
}

// Save scroll position before form submit
document.addEventListener('submit', function () {
    sessionStorage.setItem('scrollY', window.scrollY);
});

// Restore scroll position after reload
window.addEventListener('load', function () {
    const y = sessionStorage.getItem('scrollY');
    if (y !== null) {
        window.scrollTo(0, parseInt(y, 10));
        sessionStorage.removeItem('scrollY');
    }
});