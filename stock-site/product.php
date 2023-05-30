<?php 

// Connects to database
include('includes/connect.php');

// Grabs common functions
include('functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Stock</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/stock.css">
        <link rel="stylesheet" href="styles/product-details.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
        <script defer src="scripts/product-box.js"></script>
    </head>
    <body>

        <!-- HEADER SECTION -->
        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container" onclick="loadStockPage();">
                        <img class="logo" src="logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                    </div>
                </div>
                <div class="header-middle-container">
                    <form class="search-bar" action="search.php" method="get">
                        <input type="search" placeholder="Search Item" name="search-data" aria-label="Search">
                        <button type="submit" name="search-data-product" value="search">
                            <img class="search-icon" src="icons/search-icon.svg" alt="search-icon">
                        </button>
                    </form>
                </div>
                <div class="header-right-container">
                    <div class="login-container">
                        <a href="#">Register</a>
                        <a href="#">Login</a>
                    </div>
                    <img src="icons/account-icon.png" alt="my-account-icon">
                    <div class="basket-container">
                        <img src="icons/basket-icon.png" alt="basket-icon">
                        <span class="basket-number">0</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN SECTION -->
        <main>
            <div class="stock-title-container">
                <h1>Welcome to Q-Stock</h1>
                <p>
                    Browse through our products or 
                    find what you require on the
                    navigation menu.
                </p>
            </div>

            <div class="main-content">
                <nav class="sidebar">
                    <p>Categories</p>
                    <?php
                        // Fetches all categories
                        getCategories();
                    ?>
                </nav>
                <div class="sproduct">
                    <?php
                        
                        productDetails();
                    ?>
                </div>
            </div>
        </main>

        <!-- FOOTER SECTION -->
        <footer class="footer">
            <div class="footer-grid">
                <div class="left-container">
                    <div class="footer-logo-container" onclick="loadHomePage();">
                        <img class="footer-logo" src="logo/logo.jpg" alt="qubed-logo">
                    </div>
                    <div onclick="loadHomePage();">
                        <p class="footer-title">Qubed <span class="footer-title-two">Audio</span></p>
                    </div>
                </div>
                <div class="middle-container">
                    <div class="link-container">
                        <div class="middle-title-container">
                            <p>THE BORING STUFF</p>
                        </div>
                        <p><a href="../main-site/terms-and-conditions.html">Terms and Conditions</a></p>
                        <p><a href="#">Privacy Policy</a></p>
                        <p><a href="../main-site/documents/pli-insurance-certificate.pdf" target="_blank">PLI Insurance Certificate</a></p>
                    </div>
                </div>
                <div class="right-container">
                    <div class="link-container">
                        <div class="right-title-container">
                            <p>THE COMPANY</p>
                        </div>
                        <p><a href="../main-site/contact.php">Contact Us</a></p>
                        <p><a href="../main-site/home.html#about">About</a></p>
                    </div>
                </div>
                <div class="socials-container">
                    <p>SOCIALS</p>
                    <div class="socials-main-icon-container">
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/facebook-icon.svg" alt="facebook-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/twitter-icon.svg" alt="twitter-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/linkedin-icon.svg" alt="twitter-icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-container">
                <p>© 2023 Qubed Audio | All Rights Reserved</p>
                <p>Website Developed by <a target="_blank" href="https://github.com/LukeJaekel">Luke Jaekel</a></p>
            </div>
        </footer>
    </body>
</html>